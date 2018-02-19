<?php

namespace core;

use app\config;
use \core\view;

/**
 * Base controller
 *
 * PHP version 7.0
 */
abstract class controller extends app
{

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $route_params = [];

    /**
     * Class constructor
     *
     * @param array $route_params  Parameters from the route
     *
     * @return void
     */
    public function __construct($route_params) {
      $this->route_params = $route_params;
      $this->session = new session();
    }

    /**
     * Magic method called when a non-existent or inaccessible method is
     * called on an object of this class. Used to execute before and after
     * filter methods on action methods. Action methods need to be named
     * with an "Action" suffix, e.g. indexAction, showAction etc.
     *
     * @param string $name Method name
     * @param array $args Arguments passed to the method
     *
     * @return void
     */
    public function __call($name, $args) {
      $method = $name . 'Action';
      if (method_exists($this, $method)) {
        if ($this->before() !== false) {
          call_user_func_array([$this, $method], $args);
          $this->after();
        }
      } else {
        throw new \Exception("Method $method not found in controller " . get_class($this));
      }
    }

    /**
     * Before filter - called before an action method.
     *
     * @return void
     */
    protected function before() {
      if (isset($this->route_params['namespace']) && $this->route_params['namespace'] == 'admin') {
        // If not logged in
        if (!isset($_SESSION['userId'])) {
          header("Location: ".config::ROOT_APP_DIR."login");
          exit;
        }
      }
    }

    /**
     * After filter - called after an action method.
     *
     * @return void
     */
    protected function after() {
    }

    /**
     * Show the Error page
     *
     * @return void
     */
    public function errorAction($code = 404)
    {
      view::renderTemplate(config::DEFAULT_TEMPLATE, $code, $this->route_params);
    }
}

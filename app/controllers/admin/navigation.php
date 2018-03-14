<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * Navigation controller
 *
 * PHP version 7.0
 */
class navigation extends \core\controller
{
  /**
   * Shows all navigations
   *
   * @return void
   */
  public function indexAction() {
    $navigation = new \app\models\navigation();
    if ($this->route_params['navigations'] = $navigation::getNavigations()) {
      view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    } else {
      $this->errorAction();
    }
  }

  /**
   * Edits a navigation items
   *
   * @return void
   */
  public function editAction() {
    if ( isset($this->route_params['request']) ) {
      $navigation = new \app\models\navigation();
      if ($this->route_params['navigation'] = $navigation::getNavigation($this->route_params['request'])) {
        //var_dump($this->route_params);
        view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
      } else {
        $this->errorAction();
      }
    }
  }

  /**
   * Deletes a navigation item
   *
   * @return void
   */
  public function deleteAction() {
    // If the delete form is submitted
    if (isset($_POST["close"])) {
      $this->route_params['navigation'] = $_POST["close"];
      view::renderTemplate(config::DEFAULT_TEMPLATE, 'navigation/delete', $this->route_params);
    }

    // If the delete form is submitted
    if (isset($_POST["delete"])) {
      $navigation = new \app\models\navigation();
      if ($this->route_params['navigation'] = $navigation::deleteNavigationItem($_POST["delete"])) {
        view::renderTemplate(config::DEFAULT_TEMPLATE, 'navigation/index', $this->route_params);
      } else {
        $this->errorAction();
      }
    }
  }
}

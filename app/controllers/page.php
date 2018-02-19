<?php

namespace app\controllers;

use app\config;
use \core\view;

/**
 * Pages controller
 *
 * PHP version 7.0
 */
class page extends \core\controller
{

  /**
   * Show the index page
   *
   * @return void
   */
  public function showAction()
  {
    $page = new \app\models\page();
    if ($this->route_params['page'] = $page::getPage($this->route_params['request'])) {
      view::renderTemplate($this->route_params['controller'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    } else {
      $this->errorAction();
    }
  }

}

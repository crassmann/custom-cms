<?php

namespace app\controllers;

use app\config;
use \core\view;

/**
 * URLs controller
 *
 * PHP version 7.0
 */
class url extends \core\controller
{

  /**
   * Show the index url
   *
   * @return void
   */
  public function showAction()
  {
  //  var_dump($this->settings);

    $navigation = new \app\models\navigation();
    $this->route_params['navigation'] = $navigation::getNavigation(1);

    $url = new \app\models\url();
    if ($this->route_params['url'] = $url::getURL($this->route_params['request'])) {
      view::renderTemplate($this->route_params['url']['template_url'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    } else {
      $this->errorAction();
    }
  }
}

<?php

namespace app\controllers;

use app\config;
use \core\view;

/**
 * Page controller
 *
 * PHP version 7.0
 */
class page extends \core\controller
{

  /**
   * Show the index url
   *
   * @return void
   */
  public function showAction()
  {
    $url = new \app\models\url();
    $page = new \app\models\page();
    if ($this->route_params['url'] = $url::getURL($this->route_params['request'])) {
      if ($this->route_params['items'] = $page::getPageItems($this->route_params['url']['id'])) {
        view::renderTemplate($this->route_params['template'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
      } else {
        $this->route_params['items'][0]['title'] = 'Ooops!';
        $this->route_params['items'][0]['content'] = 'No Items added yet.';
        view::renderTemplate($this->route_params['template'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
      }
    } else {
      $this->errorAction();
    }
  }

}

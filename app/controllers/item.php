<?php

namespace app\controllers;

use app\config;
use \core\view;

/**
 * Item controller
 *
 * PHP version 7.0
 */
class item extends \core\controller
{
  /**
   * Shows an item
   *
   * @return void
   */
  public function showAction() {
    if ( isset($this->route_params['request']) && !empty($this->route_params['request']) ) {
      $item = new \app\models\item();
      if ($this->route_params['item'] = $item::getItem($this->route_params['request'])) {
        view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
      } else {
        $this->errorAction();
      }
    } else {
      $this->errorAction();
    }
  }
}

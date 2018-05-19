<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * Template controller
 *
 * PHP version 7.0
 */
class template extends \core\controller
{

  /**
   * Shows all Templates
   *
   * @return void
   */
  public function indexAction() {
    $template = new \app\models\template();
    if ($this->route_params['template'] = $template::getTemplates()) {
      view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    } else {
      $this->errorAction();
    }
  }

}

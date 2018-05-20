<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * Settings controller
 *
 * PHP version 7.0
 */
class settings extends \core\controller
{

  /**
   * Shows all Templates
   *
   * @return void
   */
  public function indexAction() {

    if (isset($_POST['submit']) && $_POST['submit'] == 'save') {
      $post = [];
      foreach ($_POST as $key => $value) {
        $post[$key] = trim($value); // trim the user input
      }

      $changes = [];
  		foreach ($this->route_params['property'] as $key => $value) {
  			if (array_key_exists ( $key , $post )) {
  				if ($post[$key] != $value) {
  					$changes[$key] = $post[$key];
            $this->route_params['property'][$key] = $post[$key];
  				}
  			}
  		}

      if (count($changes) > 0) {
        $settings = new \app\models\settings();
        foreach ($changes as $prop => $value) {
          $settings::edit($prop, $value);
        }
      }
    }

    view::renderTemplate($this->route_params['template'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
  }

}

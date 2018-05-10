<?php

namespace app\controllers;

use app\config;
use \core\view;

/**
 * URLs controller
 *
 * PHP version 7.0
 */
class search extends \core\controller
{

  /**
   * Show the index url
   *
   * @return void
   */
  public function resultAction()
  {
    $contents = file_get_contents($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."app/assets/products.JSON");
    $products = json_decode($contents);
    $products->data;

    if (empty($_POST['q'])) {
      if (!empty($this->route_params['request'])) {
        $request = $this->route_params['request'];
      } else {
        $request = " ";
      }
    } else {
      $request = strtolower($_POST['q']);
    }

    $resultData = array();
    foreach ($products->data as $obj) {
      $i = false;
      foreach ($obj as $key => $value) {
        if (is_array($value)) {
          foreach ($value as $k => $v) {
            $pos = strpos(strtolower($v), $request);
          }
        } else {
          $pos = strpos(strtolower($value), $request);
        }
        if ($pos === false) {
        } else {
          $i = true;
        }
      }
      if ($i) {
        $resultData[] = $obj;
      }
    }
    $this->route_params['products'] = $resultData;

    $navigation = new \app\models\navigation();
    $this->route_params['navigation'] = $navigation::getNavigation(1);
    view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);

  }
}

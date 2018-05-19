<?php

namespace app\controllers;

use app\config;
use \core\view;

/**
 * Search controller
 *
 * PHP version 7.0
 */
class search extends \core\controller
{

  /**
   * Show the search result
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
        $request = "Polarino";
      }
    } else {
      $request = strtolower($_POST['q']);
    }

    $req = explode(' ', $request);

    $resultData = array();
    foreach ($products->data as $obj) {
      $i = false;
      foreach ($obj as $key => $value) {
        if (is_array($value)) {
          foreach ($value as $k => $v) {
            foreach ($req as $rkey => $rvalue) {
              $pos = strpos(strtolower($v), $rvalue);
            }
          }
          if ($pos === false) {
          } else {
            $i = true;
          }
        } else {
          foreach ($req as $rkey => $rvalue) {
            $pos = strpos(strtolower($value), $rvalue);
          }
          if ($pos === false) {
          } else {
            $i = true;
          }
        }
      }
      if ($i) {
        $resultData[] = $obj;
      }
    }
    $this->route_params['products'] = $resultData;

    $navigation = new \app\models\navigation();
    $this->route_params['navigation'] = $navigation::getNavigation(1);

    $url = new \app\models\url();
    if ($this->route_params['url'] = $url::getURL($this->route_params['request'])) {
      view::renderTemplate($this->route_params['url']['template_url'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    } else {
      view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    }

  }
}

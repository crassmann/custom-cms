<?php

namespace app\controllers;

use app\config;
use \core\view;

/**
 * Product controller
 *
 * PHP version 7.0
 */
class product extends \core\controller
{

  /**
   * List products
   *
   * @return void
   */
  public function listAction()
  {
    $contents = file_get_contents($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."app/assets/products.JSON");
    // $contents = utf8_encode($contents);
    $products = json_decode($contents);
    $this->route_params['products'] = array();

    if (!empty($this->route_params['params'])) {
      $p = array();
      $params = explode("&", $this->route_params['params']);
      foreach ($params as $key => $value) {
        $t = explode("=", $value);
        $p[] = $t[0];
        $p[] = $t[1];
      }

      foreach ($products->data as $obj) {
        if ($obj->{'variations.ageGroup'} == 'JUGENDLICHE') {
          $obj->{'variations.ageGroup'} = 'KINDER';
        }
        if ($obj->{'variations.gender'} == 'UNISEX') {
          $obj->{'variations.gender'} = 'WEIBLICH';
        }
        if ((count($p)/2) == 1) {
          if ($obj->{$p[0]} == $p[1]) {
            $this->route_params['products'][] = $obj;
          }
        }
        if ((count($p)/2) == 2) {
          if ($obj->{$p[0]} == $p[1] && $obj->{$p[2]} == $p[3]) {
            $this->route_params['products'][] = $obj;
          }
        }
        if ((count($p)/2) == 3) {
          if ($obj->{$p[0]} == $p[1] && $obj->{$p[2]} == $p[3] && $obj->{$p[4]} == $p[5]) {
            $this->route_params['products'][] = $obj;
          }
        }
      }
    } else {
      $this->route_params['products'] = $products->data;
    }

    $categories = array();
    foreach ($this->route_params['products'] as $obj) {
      foreach ($obj as $key => $value) {
        if ($key == 'classification.group') {
          if (!in_array(ucfirst(strtolower($value)), $categories)) {
            $categories[] = ucfirst(strtolower($value));
          }
        }
      }
    }
    sort($categories);
    $this->route_params['categories'] = $categories;

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

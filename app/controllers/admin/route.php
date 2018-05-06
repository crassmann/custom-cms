<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * Routes controller
 *
 * PHP version 7.0
 */
class route extends \core\controller
{

  /**
   * Shows all Templates
   *
   * @return void
   */
  public function indexAction() {
    $route = new \app\models\route();
    if ($this->route_params['route'] = $route::getRoutes()) {
      view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    } else {
      $this->errorAction();
    }
  }

  /**
   * Adds a new URL
   *
   * @return void
   */
  public function newAction() {
    $route = new \app\models\route();
    // If the form is submitted
    if (isset($_POST["submit"]) && $_POST["submit"] == "add") {

      $post = [];
      foreach ($_POST as $key => $value) {
        $post[$key] = trim($value); // trim the user input
      }
      var_dump($post);
      if ($this->route_params['route'] = $route::new($post)) {
        header("Location: ".config::ROOT_APP_DIR."route/edit/".$this->route_params['route']);
      } else {
        view::renderTemplate(config::DEFAULT_TEMPLATE, 'route/new', $this->route_params);
      }

    } else {
      view::renderTemplate(config::DEFAULT_TEMPLATE, 'route/new', $this->route_params);
    }
  }

  /**
   * Edits a URL
   *
   * @return void
   */
  public function editAction() {
    $url = new \app\models\route();
    $this->route_params['url'] = $url::getURL($this->route_params['request']);
    $this->route_params['templates'] = $url::getTemplates();

    // If the form is submitted
    if (isset($_POST["submit"]) && $_POST["submit"] == "edit") {

      $post = [];
      foreach ($_POST as $key => $value) {
        $post[$key] = trim($value); // trim the user input
      }

      $changes = [];
  		foreach ($this->route_params['url'] as $key => $value) {
  			if (array_key_exists ( $key , $post )) {
  				if ($post[$key] != $value) {
  					$changes[$key] = $post[$key];
            $this->route_params['url'][$key] = $post[$key];
  				}
  			}
  		}
      if (count($changes) > 0) {
        if ($this->route_params['url']['edit'] = $url::edit($this->route_params['url']['id'], $changes)) {
          header("Location: ".config::ROOT_APP_DIR.$this->route_params['controller']."/".$this->route_params['action']."/".$this->route_params['url']['url']);
          exit;
        } else {
          $this->errorAction();
          exit;
        }
      }

    }
    view::renderTemplate(config::DEFAULT_TEMPLATE, 'url/edit', $this->route_params);

  }

  /**
   * Deletes a URL
   *
   * @return void
   */
  public function deleteAction() {
    // If the delete form is submitted
    if (isset($_POST["close"])) {
      $this->route_params['route'] = $_POST["close"];
      view::renderTemplate(config::DEFAULT_TEMPLATE, 'route/delete', $this->route_params);
    }

    // If the delete form is submitted
    if (isset($_POST["delete"])) {
      $route = new \app\models\route();
      if ($this->route_params['route'] = $route::deleteRoute($_POST["delete"])) {
        header("Location: ".config::ROOT_APP_DIR."route/index/");
      } else {
        $this->errorAction();
      }
    }
  }

}

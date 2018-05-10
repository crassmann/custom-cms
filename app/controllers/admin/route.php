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
   * Adds a new Route
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
   * Edits a Route
   *
   * @return void
   */
  public function editAction() {
    $route = new \app\models\route();
    $this->route_params['route'] = $route::getRoute($this->route_params['request']);
    // If the form is submitted
    if (isset($_POST["submit"]) && $_POST["submit"] == "edit") {

      $post = [];
      foreach ($_POST as $key => $value) {
        $post[$key] = trim($value); // trim the user input
      }

      $changes = [];
  		foreach ($this->route_params['route'] as $key => $value) {
  			if (array_key_exists ( $key , $post )) {
  				if ($post[$key] != $value) {
  					$changes[$key] = $post[$key];
            $this->route_params['route'][$key] = $post[$key];
  				}
  			}
  		}
      if (count($changes) > 0) {
        if ($this->route_params['route']['edit'] = $route::edit($this->route_params['route']['route_id'], $changes)) {
          header("Location: ".config::ROOT_APP_DIR.$this->route_params['controller']."/".$this->route_params['action']."/".$this->route_params['route']['route_id']);
          exit;
        } else {
          $this->errorAction();
          exit;
        }
      }

    }
    view::renderTemplate(config::DEFAULT_TEMPLATE, 'route/edit', $this->route_params);

  }

  /**
   * Deletes a Route
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

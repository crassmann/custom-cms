<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * Item controller
 *
 * PHP version 7.0
 */
class item extends \app\controllers\item
{
  /**
   * Shows all items
   *
   * @return void
   */
  public function indexAction() {
    $item = new \app\models\item();
    if ($this->route_params['item'] = $item::getItems()) {
      view::renderTemplate($this->route_params['template'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    } else {
      $this->errorAction();
    }
  }

  /**
   * Adds a new item
   *
   * @return void
   */
  public function newAction() {
    // If the form is submitted
    if (isset($_POST["submit"]) && $_POST["submit"] == "add") {

      $post = [];
      foreach ($_POST as $key => $value) {
        $post[$key] = trim($value); // trim the user input
      }
      $item = new \app\models\item();
      if ($this->route_params['item'] = $item::new($post)) {
        header("Location: ".config::ROOT_APP_DIR."item/index/");
      } else {
        view::renderTemplate(config::DEFAULT_TEMPLATE, 'item/new', $this->route_params);
      }

    } else {
      view::renderTemplate(config::DEFAULT_TEMPLATE, 'item/new', $this->route_params);
    }
  }

  /**
   * Edits an item
   *
   * @return void
   */
  public function editAction() {
    $item = new \app\models\item();
    $this->route_params['item'] = $item::getItem($this->route_params['request']);

    // If the form is submitted
    if (isset($_POST["submit"]) && $_POST["submit"] == "edit") {

      $post = [];
      foreach ($_POST as $key => $value) {
        $post[$key] = trim($value); // trim the user input
      }

      $changes = [];
  		foreach ($this->route_params['item'] as $key => $value) {
  			if (array_key_exists ( $key , $post )) {
  				if ($post[$key] != $value) {
  					$changes[$key] = $post[$key];
            $this->route_params['item'][$key] = $post[$key];
  				}
  			}
  		}
      if (count($changes) > 0) {
        if ($this->route_params['item']['edit'] = $item::edit($this->route_params['item']['id'], $changes)) {
          header("Location: ".config::ROOT_APP_DIR.$this->route_params['controller']."/".$this->route_params['action']."/".$this->route_params['item']['id']);
          exit;
        } else {
          $this->errorAction();
          exit;
        }
      }

    }
    view::renderTemplate(config::DEFAULT_TEMPLATE, 'item/new', $this->route_params);
  }

  /**
   * Deletes an item
   *
   * @return void
   */
  public function deleteAction() {
    // If the delete form is submitted
    if (isset($_POST["close"])) {
      $this->route_params['item']['id'] = $_POST["close"];
      view::renderTemplate(config::DEFAULT_TEMPLATE, 'item/delete', $this->route_params);
    }

    // If the delete form is submitted
    if (isset($_POST["delete"])) {
      $item = new \app\models\item();
      $page = new \app\models\page();
      if ($this->route_params['item'] = $item::deleteItem($_POST["delete"])) {
        if ($this->route_params['item'] = $page::deleteByItem($_POST["delete"])) {
          header("Location: ".config::ROOT_APP_DIR."item/index/");
        } else {
          $this->errorAction();
        }
      } else {
        $this->errorAction();
      }
    }
  }
}

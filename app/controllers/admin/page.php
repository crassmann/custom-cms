<?php

namespace app\controllers\admin;

use \app\config;
use \core\view;

/**
 * Pages controller
 *
 * PHP version 7.0
 */
class page extends \app\controllers\page
{

  /**
   * Shows all pages
   *
   * @return void
   */
  public function indexAction() {
    $page = new \app\models\page();
    if ($this->route_params['page'] = $page::getPages()) {
      view::renderTemplate(basename(__DIR__), 'page/index', $this->route_params);
    } else {
      $this->errorAction();
    }
  }

  /**
   * Adds a new page
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
      $page = new \app\models\page();
      if ($this->route_params['page'] = $page::new($post)) {
        header("Location: ".config::ROOT_APP_DIR."page/edit/".$post['url']);
      } else {
        view::renderTemplate(basename(__DIR__), 'page/new', $this->route_params);
      }

    } else {
      view::renderTemplate(basename(__DIR__), 'page/new', $this->route_params);
    }
  }

  /**
   * Edits a page
   *
   * @return void
   */
  public function editAction() {
    $page = new \app\models\page();
    $this->route_params['page'] = $page::getPage($this->route_params['request']);

    // If the form is submitted
    if (isset($_POST["submit"]) && $_POST["submit"] == "edit") {

      $post = [];
      foreach ($_POST as $key => $value) {
        $post[$key] = trim($value); // trim the user input
      }

      $changes = [];
  		foreach ($this->route_params['page'] as $key => $value) {
  			if (array_key_exists ( $key , $post )) {
  				if ($post[$key] != $value) {
  					$changes[$key] = $post[$key];
            $this->route_params['page'][$key] = $post[$key];
  				}
  			}
  		}
      if (count($changes) > 0) {
        if ($this->route_params['page']['edit'] = $page::edit($this->route_params['page']['id'], $changes)) {
          header("Location: ".config::ROOT_APP_DIR.$this->route_params['controller']."/".$this->route_params['action']."/".$this->route_params['page']['url']);
          exit;
        } else {
          $this->errorAction();
          exit;
        }
      }

    }
    view::renderTemplate(basename(__DIR__), 'page/new', $this->route_params);

  }

  /**
   * Deletes a page
   *
   * @return void
   */
  public function deleteAction() {
    // If the delete form is submitted
    if (isset($_POST["close"])) {
      $this->route_params['page'] = $_POST["close"];
      view::renderTemplate(basename(__DIR__), 'page/delete', $this->route_params);
    }

    // If the delete form is submitted
    if (isset($_POST["delete"])) {
      $page = new \app\models\page();
      if ($this->route_params['page'] = $page::deletePage($_POST["delete"])) {
        view::renderTemplate(basename(__DIR__), 'page/index', $this->route_params);
      } else {
        $this->errorAction();
      }
    }
  }

}

<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * URLs controller
 *
 * PHP version 7.0
 */
class url extends \app\controllers\url
{

  /**
   * Shows all URLs
   *
   * @return void
   */
  public function indexAction() {
    $url = new \app\models\url();
    if ($this->route_params['url'] = $url::getURLs()) {
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
    // If the form is submitted
    if (isset($_POST["submit"]) && $_POST["submit"] == "add") {

      $post = [];
      foreach ($_POST as $key => $value) {
        $post[$key] = trim($value); // trim the user input
      }
      $url = new \app\models\url();
      if ($this->route_params['url'] = $url::new($post)) {
        header("Location: ".config::ROOT_APP_DIR."url/edit/".$post['url']);
      } else {
        view::renderTemplate(config::DEFAULT_TEMPLATE, 'url/new', $this->route_params);
      }

    } else {
      view::renderTemplate(config::DEFAULT_TEMPLATE, 'url/new', $this->route_params);
    }
  }

  /**
   * Edits a URL
   *
   * @return void
   */
  public function editAction() {
    $url = new \app\models\url();
    $this->route_params['url'] = $url::getURL($this->route_params['request']);

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
    view::renderTemplate(config::DEFAULT_TEMPLATE, 'url/new', $this->route_params);

  }

  /**
   * Deletes a URL
   *
   * @return void
   */
  public function deleteAction() {
    // If the delete form is submitted
    if (isset($_POST["close"])) {
      $this->route_params['url'] = $_POST["close"];
      view::renderTemplate(config::DEFAULT_TEMPLATE, 'url/delete', $this->route_params);
    }

    // If the delete form is submitted
    if (isset($_POST["delete"])) {
      $url = new \app\models\url();
      $page = new \app\models\page();
      if ($this->route_params['url'] = $url::deleteURL($_POST["delete"])) {
        if ($this->route_params['url'] = $page::deleteByURL($_POST["delete"])) {
          header("Location: ".config::ROOT_APP_DIR."url/index/");
        } else {
          $this->errorAction();
        }
      } else {
        $this->errorAction();
      }
    }
  }

}

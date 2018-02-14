<?php

namespace app\controllers\admin;

use \app\config;
use \app\auth;
use \core\view;

/**
 * Pages controller
 *
 * PHP version 7.0
 */
class user extends \app\controllers\user
{

  /**
   * Show the user index page
   *
   * @return void
   */
  public function indexAction()
  {
    $user = new \app\models\user();
    if ($this->route_params['user'] = $user::getUsers()) {
      view::renderTemplate(basename(__DIR__), 'user/index', $this->route_params);
    } else {
      $this->errorAction();
    }
  }

  /**
   * Adds a new user
   *
   * @return void
   */
  public function newAction()
  {
    // If the form is submitted
    if (isset($_POST["submit"]) && $_POST["submit"] == "add") {

      foreach ($_POST as $key => $value) {
        $_POST[$key] = trim($value); // trim the user input
      }

      $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $user = new \app\models\user();
        if ($addedUserId = $user::new($_POST)) {
          header("Location: ".config::ROOT_APP_DIR."user/index/");
        }
      } else {
        $error[] = $_POST['email']. " is not a valid email address";
      }

    } else {
      view::renderTemplate(basename(__DIR__), 'user/new', $this->route_params);
    }
  }

  /**
   * Edits a user
   *
   * @return void
   */
  public function editAction()
  {
    $user = new \app\models\user();
    $this->route_params['editUser'] = $user::getUserById($this->route_params['request']);

    // If the form is submitted
    if (isset($_POST["submit"]) && $_POST["submit"] == "edit") {

      $post = [];
      foreach ($_POST as $key => $value) {
        $post[$key] = trim($value); // Filter the user input
      }

      $changes = [];
  		foreach ($this->route_params['editUser'] as $key => $value) {
  			if (array_key_exists ( $key , $post )) {
  				if ($post[$key] != $value) {
  					$changes[$key] = $post[$key];
            $this->route_params['editUser'][$key] = $post[$key];
  				}
  			}
  		}
      if (count($changes) > 0) {
        if ($this->route_params['editUser']['edit'] = $user::edit($this->route_params['editUser']['id'], $changes)) {
          header("Location: ".config::ROOT_APP_DIR.$this->route_params['controller']."/".$this->route_params['action']."/".$this->route_params['editUser']['id']);
          exit;
        } else {
          $this->errorAction();
          exit;
        }
      }

    }
    view::renderTemplate(basename(__DIR__), 'user/new', $this->route_params);

  }

  /**
   * Deletes a User
   *
   * @return void
   */
  public function deleteAction()
  {
    // If the delete user form is submitted
    if (isset($_POST["deleteUser"])) {
      $this->route_params['deleteUser'] = $_POST["deleteUser"];
      view::renderTemplate(basename(__DIR__), 'user/delete', $this->route_params);
    }

    // If the delete form is submitted
    if (isset($_POST["userDelete"])) {
      $user = new \app\models\user();
      $auth = new \app\models\auth();
      if ($this->route_params['deleteUser'] = $user::deleteUser($_POST["userDelete"])) {
        $auth::removeAuthTokenByUserId($_POST["userDelete"]);
        $auth::removeAuthCookie();
        $this->indexAction();
      } else {
        $this->errorAction();
      }
    }
  }
}

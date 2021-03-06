<?php

namespace app\controllers;

use app\config;
use app\auth;
use \core\view;

/**
 * Pages controller
 *
 * PHP version 7.0
 */
class user extends \core\controller
{

  /**
   * Sign in the user
   *
   * @return void
   */
  public function loginAction()
  {
    if (isset($_SESSION['userId'])) {
      header("Location: ".config::ROOT_APP_DIR."url/index/");
      exit;
    }

    $u = new \app\models\user();
    if ($u::countLoginAttempts() >= config::MAX_LOGIN_ATTEMPTS) {
      header("Location: ".config::ROOT_APP_DIR);
      exit;
    }

    if (isset($_COOKIE['rememberMe'])) {
      $auth = new \app\models\auth();
      if ($auth_token = $auth::checkAuthToken($_COOKIE['rememberMe'])) {
        if ($auth::removeAuthTokenBySelector($auth_token['selector'])) {
          if ($auth::addAuth($auth_token['user_id'])) {
            $u = new \app\models\user();
            $user = $u::getUserById($auth_token['user_id']);
            $_SESSION['userId'] = $auth_token['user_id'];
            $_SESSION['userName'] = $user['name'];
            $_SESSION['userRole'] = $user['role'];
            $u::updateLastLogin($auth_token['user_id']);
            header("Location: ".config::ROOT_APP_DIR."url/index/");
          } else {
            $error[] = 'Error while adding Auth Token. Please contact the administrator.';
          }
        } else {
          $error[] = 'Error while removing Auth Token. Please contact the administrator.';
        }
      } else {
        $error[] = 'Invalid Auth Token provided. Delete your cookie or sign in again permanently.';
      }
    }

    if (isset($_POST["submit"], $_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {

      $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);


      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $u = new \app\models\user();
        $hashPassword = $u::getPasswordHash($_POST['email']);

        if (password_verify($_POST['password'], $hashPassword)) {
          $this->route_params['user'] = $u::getUserByEmail($_POST['email']);
          if ($this->route_params['user']['failed_attempts'] < config::MAX_LOGIN_ATTEMPTS) {
            $u::updateLastLogin($this->route_params['user']['id']);
            $u::resetFailedLoginAttempts($this->route_params['user']['id']);
            $_SESSION['userId'] = $this->route_params['user']['id'];
            $_SESSION['userName'] = $this->route_params['user']['name'];
            $_SESSION['userRole'] = $this->route_params['user']['role'];
            if (isset($_POST["rememberMe"]) && $_POST["rememberMe"] = "remember-me") {
              $auth = new \app\models\auth();
              if ($auth::addAuth($this->route_params['user']['id'])) {
                header("Location: ".config::ROOT_APP_DIR."route/index/");
              } else {
                $error[] = "Remember Me Error";
              }
            }
            header("Location: ".config::ROOT_APP_DIR."route/index/");
          } else {
            $error[] = "Account closed due to too many login attempts!";
          }

        }
        else {
          $u::increaseFailedLoginAttempts($_POST['email']);
          $addAttempt = $u::addLoginAttempt();
          $error[] = "Please provide valid credentials!";
        }

      } else {
        $error[] = $_POST['email']. " is not a valid email address";
      }
    }
    if (isset($error)) {
      $this->route_params['error'] = $error;
    }
    view::renderTemplate($this->route_params['template'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
  }

  /**
   * Logout the user
   *
   * @return array
   */
  public function logoutAction()
  {
    if (isset($_SESSION['userId'])) {
      $this->session->destroy(session_id());
      $this->route_params['user'] = NULL;
      header("Location: ".config::ROOT_APP_DIR."login");
      exit;
    } else {
      header("Location: ".config::ROOT_APP_DIR."login");
    }
  }

}

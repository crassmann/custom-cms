<?php

namespace app\controllers;

use app\config;
use \core\view;
use \core\cookie;

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
      header("Location: ".config::ROOT_APP_DIR."user/index/");
      exit;
    }

    if (isset($_COOKIE['rememberMe'])) {
      $cookie = new \core\cookie();
      if ($auth_token = $cookie::checkAuthCookie($_COOKIE['rememberMe'])) {
        $u = new \app\models\user();
        $user = $u::getUserById($auth_token['user_id']);
        $_SESSION['userId'] = $auth_token['user_id'];
        $_SESSION['userName'] = $user['name'];
        header("Location: ".config::ROOT_APP_DIR."user/index/");
      } else {
        $error[] = 'auth_token = false';
      }
    }

    if (isset($_POST["submit"], $_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {

      $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $u = new \app\models\user();
        $hashPassword = $u::getPasswordHash($_POST['email']);

        if (password_verify($_POST['password'], $hashPassword)) {
          $this->route_params['user'] = $u::getUserByEmail($_POST['email']);
          $_SESSION['userId'] = $this->route_params['user']['id'];
          $_SESSION['userName'] = $this->route_params['user']['name'];

          if (isset($_POST["rememberMe"]) && $_POST["rememberMe"] = "remember-me") {
            $cookie = new \core\cookie();
            if ($cookie::addAuthCookie($this->route_params['user']['id'])) {
              header("Location: ".config::ROOT_APP_DIR."user/index/");
            } else {
              $error[] = "Remember Me Error";
            }
          }
          header("Location: ".config::ROOT_APP_DIR."user/index/");
        }
        else {
          $error[] = "Password is not valid";
        }

      } else {
        $error[] = $_POST['email']. " is not a valid email address";
      }
    }
    if (isset($error)) {
      $this->route_params['error'] = $error;
    }
    view::renderTemplate($this->route_params['controller'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
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

  /**
   * Generate Token
   *
   * @return array
   */
  public function generateToken($length = config::TOKEN_LENGTH)
  {
      return bin2hex(random_bytes($length));
  }
}

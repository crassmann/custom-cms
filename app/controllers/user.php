<?php

namespace app\controllers;

use app\config;
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
      header("Location: ".config::ROOT_APP_DIR."user/index/");
      exit;
    }

    $user = new \app\models\user();

    if (isset($_COOKIE['rememberMe']))
    {
      // Separate selector from validator
      $cookie = explode("#", $_COOKIE['rememberMe']);
      $selector = $cookie[0];
      $validator = $cookie[1];
      // Grab the row in auth_tokens for the given selector. If none is found, abort
      if ($auth_token = $user::getAuthTokenBySelector($selector)) {
        // Hash the validator provided by the user's cookie with SHA-256
        $hashedValidator = hash('sha256', $validator);

        // Compare the SHA-256 hash we generated with the hash stored in the database, using hash_equals()
        if (hash_equals($hashedValidator, $auth_token['hashed_validator'])) {
          // If step passes, associate the current session with the appropriate user ID
          $_SESSION['userId'] = $auth_token['user_id'];
          $un = $user::getUserById($_SESSION['userId']);
          $_SESSION['userName'] = $un['name'];
          header("Location: ".config::ROOT_APP_DIR."user/index/");
        } else {
          $error[] = 'auth_token = false';
        }
      }
    }

    if (isset($_POST["submit"], $_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {

      $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $hashPassword = $user::getPasswordHash($_POST['email']);

        if (password_verify($_POST['password'], $hashPassword)) {
          $this->route_params['user'] = $user::getUserByEmail($_POST['email']);
          $_SESSION['userId'] = $this->route_params['user']['id'];
          $_SESSION['userName'] = $this->route_params['user']['name'];

          if (isset($_POST["rememberMe"]) && $_POST["rememberMe"] == "remember-me")
          {
            $selector = $this->generateToken(6);
            $validator = $this->generateToken();
            $hashedValidator = hash('sha256', $validator);

            $expires = mktime(0, 0, 0, date("m")  , date("d")+config::COOKIE_LIFETIME, date("Y"));
            $remember_me = $selector."#".$validator;
            setcookie("rememberMe", $remember_me, $expires);
            if ($auth_token = $user::addAuthToken($selector, $hashedValidator, $this->route_params['user']['id'], $expires))
            {
              header("Location: ".config::ROOT_APP_DIR."user/index/");
            }
            else {
              $error[] = "Remember Me Error";
            }
          }
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

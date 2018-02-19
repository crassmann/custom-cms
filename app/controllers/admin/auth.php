<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * Pages controller
 *
 * PHP version 7.0
 */
class auth extends \core\controller
{
  /**
   * Delete Auth
   *
   * @return void
   */
  public function deleteAction()
  {
    // If the delete form is submitted
    if (isset($_POST["authDelete"])) {
      $auth = new \app\models\auth();
      if ($this->route_params['deleteAuth'] = $auth::removeAuthTokenByUserId($_POST["authDelete"])) {
        $auth::removeAuthCookie();
        header("Location: ".config::ROOT_APP_DIR."user/index/");
      } else {
        $this->errorAction();
      }
    } else {
      $this->route_params['deleteAuth'] = $this->route_params['request'];
      view::renderTemplate(config::DEFAULT_TEMPLATE, 'auth/delete', $this->route_params);
    }
  }
}

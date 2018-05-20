<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * Upload controller
 *
 * PHP version 7.0
 */
class upload extends \core\controller
{

  /**
   * Upload a file
   *
   * @return void
   */
  public function newAction()
  {
    var_dump($_FILES);
    $ds = DIRECTORY_SEPARATOR;
    $storeFolder = config::ROOT_APP_DIR."app/assets/img/";
    if (!empty($_FILES)) {
      var_dump($_FILES);
      $tempFile = $_FILES['file']['tmp_name'];
      $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
      $targetFile =  $targetPath. $_FILES['file']['name'];
      move_uploaded_file($tempFile,$targetFile);
    }
    view::renderTemplate($this->route_params['template'], $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
  }
}

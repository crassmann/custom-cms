<?php
namespace core;

use PDO;
use app\config;

/**
 * Base app
 *
 * PHP version 7.0
 */
abstract class app
{
  /**
   * Session Parameters
   * @var array
   */
  public $session;

  /**
   * App constructor
   *
   * @return void
   */
  public function __construct() {
  }

}
?>

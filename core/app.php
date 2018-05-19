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
   * App Parameters
   * @var array
   */
  public $session;
  public $settings;

  /**
   * App constructor
   *
   * @return void
   */
  public function __construct() {
  }
}
?>

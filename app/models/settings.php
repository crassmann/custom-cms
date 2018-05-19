<?php

namespace app\models;

use PDO;

/**
 * Settings model
 *
 * PHP version 7.0
 */
class settings extends \core\model
{
  /**
   * Get all Settings as an associative array
   *
   * @return array
   */
  public static function getSettings() {
    $db = static::getDB();
    $sql = "SELECT * FROM `settings`\n"
    . "WHERE 1\n";
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

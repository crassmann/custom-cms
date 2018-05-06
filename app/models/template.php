<?php

namespace app\models;

use PDO;

/**
 * url model
 *
 * PHP version 7.0
 */
class template extends \core\model
{

  /**
   * Get all templates as an associative array
   *
   * @return array
   */
  public static function getTemplates() {
    $db = static::getDB();
    $sql = "SELECT * FROM `templates`\n"
    . "WHERE 1";
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

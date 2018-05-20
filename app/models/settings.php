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

  /**
   * Get property
   *
   * @string Property name
   *
   * @return array
   */
  public static function getProperty($name) {
    $db = static::getDB();
    $sql = "SELECT * FROM `settings`\n"
    . "WHERE property = :property LIMIT 1";
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute( array(':property' => $name) );
      if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return $result;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Edits a url affecteds properties
   *
   * @param Int $id  The url id
   * @param Array $changes  The url params
   *
   * @return boolean
   */
  public static function edit($property, $value) {
    $db = static::getDB();
    $sql = "UPDATE `settings` SET `value` = :value WHERE `settings`.`property` = :property";
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute( array(':value' => $value, ':property' => $property) );
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }
}

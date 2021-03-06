<?php
namespace app\models;

use app\config;
use PDO;

/**
 * Navigation class
 *
 * PHP version 7.0
 */
class navigation extends \core\model
{
  /**
   * Get Navigations
   *
   * @return array or false
   */
  public static function getNavigations() {
    $db = static::getDB();
    $sql = 'SELECT * FROM `navigations`'
            . ' WHERE 1'
            . ' ORDER BY'
            . ' `navigations`.`id` ASC';
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute();
      if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        return $result;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return $e;
    }
  }

  /**
   * Get Navigation
   *
   * @param Int $nid  The navigation id
   *
   * @return array or false
   */
  public static function getNavigation($nid, $parent = 0) {
    $db = static::getDB();
    $sql = 'SELECT * FROM `urls`'
          . ' JOIN `navigation_items`'
          . ' ON `navigation_items`.`pid` = `urls`.`id`'
          . ' WHERE `navigation_items`.`nid` = :nid'
          . ' AND `navigation_items`.`parent` = :parent'
          . ' ORDER BY `position`,`child_position` ASC';
    $stmt = $db->prepare($sql);
    $params = array(
      ':nid' => $nid,
      ':parent' => $parent,
    );
    try {
      $stmt->execute( $params );
      if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        return $result;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return $e;
    }
  }

  /**
   * Get Navigation
   *
   * @param Int $nid  The navigation id
   *
   * @return array or false
   */
  public static function getNavigationItems($nid) {
    $db = static::getDB();
    $sql = 'SELECT * FROM `urls`'
          . ' JOIN `navigation_items`'
          . ' ON `navigation_items`.`pid` = `urls`.`id`'
          . ' WHERE `navigation_items`.`nid` = :nid'
          . ' ORDER BY `position`,`child_position` ASC';
    $stmt = $db->prepare($sql);
    $params = array(
      ':nid' => $nid,
    );
    try {
      $stmt->execute( $params );
      if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        return $result;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return $e;
    }
  }

  /**
   * Adds a navigation item
   *
   * @param Int $nid  The navi id
   * @param Int $pid  The page id
   *
   * @return boolean
   */
  public static function addNavigationItem($nid, $pid) {
    $db = static::getDB();
    $sql = "INSERT INTO `navigation_items` (`navi_id`, `nid`, `pid`, `position`, `parent`, `child_position`, `date_modified`) VALUES (NULL, :nid, :pid, :position, :parent, :child_position, CURRENT_TIMESTAMP)";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(
        ':nid' => $nid,
        ':pid' => $pid,
        ':position' => 0,
        ':parent' => 0,
        ':child_position' => -1,
        )
      )) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Updates a navigation item
   *
   * @param Int $id  The page id
   *
   * @return array
   */
  public static function updateNavigationItem($field, $navi_id, $value) {
    $db = static::getDB();
    $sql = "UPDATE `navigation_items` SET `$field` = :value WHERE `navigation_items`.`navi_id` = :navi_id";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(
      ':value' => $value,
      ':navi_id' => $navi_id,
      ) )) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Deletes a navigation item
   *
   * @param Int $id  The page id
   *
   * @return array
   */
  public static function deleteNavigationItem($id) {
    $db = static::getDB();
    $sql = "DELETE FROM `navigation_items` WHERE `navi_id` = :id";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(':id' => $id) )) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Deletes an item by URL id
   *
   * @param Int $id  The url id
   *
   * @return array
   */
  public static function deleteByURL($url_id) {
    $db = static::getDB();
    $sql = "DELETE FROM `navigation_items` WHERE `pid` = :url_id";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(':url_id' => $url_id) )) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }
}
?>

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
  public static function getNavigation($nid) {
    $db = static::getDB();
    $sql = 'SELECT * FROM `pages`'
          . ' JOIN `navigation_items`'
          . ' ON `navigation_items`.`pid` = `pages`.`id`'
          . ' WHERE `navigation_items`.`nid` = :nid'
          . ' AND `navigation_items`.`parent` = :parent'
          . ' ORDER BY `position` ASC';
    $stmt = $db->prepare($sql);
    $params = array(
      ':nid' => $nid,
      ':parent' => 0,
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
   * Deletes a navigation item
   *
   * @param Int $id  The page id
   *
   * @return array
   */
  public static function deleteNavigationItem($nid, $pid) {
    $db = static::getDB();
    $sql = "DELETE FROM `navigation_items` WHERE `nid` = :nid AND `pid` = :pid";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(':nid' => $nid, ':pid' => $pid) )) {
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

<?php

namespace app\models;

use PDO;

/**
 * url model
 *
 * PHP version 7.0
 */
class page extends \core\model
{
  /**
   * Gets all pages
   *
   * @param Int $id  The url id
   *
   * @return array
   */
  public static function getPages() {
    $db = static::getDB();
    $sql = "SELECT url_id, COUNT(item_id) AS items, urls.name, urls.url FROM `pages`\n"
        . "JOIN urls ON urls.id = url_id\n"
        . "WHERE 1 GROUP BY url_id";
    try {
      if ($stmt = $db->query($sql)) {
        if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
          return $result;
        } else {
          return false;
        }
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Gets a url items
   *
   * @param Int $id  The url id
   *
   * @return array
   */
  public static function getPageItems($id) {
    $db = static::getDB();
    $sql = "SELECT * FROM `items` \n"
        . "JOIN pages ON pages.item_id = items.id\n"
        . "WHERE pages.url_id = :id ORDER BY position ASC";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(':id' => $id) )) {
        if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
          return $result;
        } else {
          return false;
        }
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
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
  public static function addItem($url_id, $item_id) {
    $db = static::getDB();
    $sql = "INSERT INTO `pages` (`page_id`, `url_id`, `item_id`, `position`, `date_modified`) VALUES (NULL, :url_id, :item_id, :position, CURRENT_TIMESTAMP)";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(
        ':url_id' => $url_id,
        ':item_id' => $item_id,
        ':position' => 0,
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
   * Updates a page item
   *
   * @param Int $id  The page id
   *
   * @return array
   */
  public static function updatePageItem($page_id, $position) {
    $db = static::getDB();
    $sql = "UPDATE `pages` SET `position` = :position WHERE `pages`.`page_id` = :page_id";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(':position' => $position, ':page_id' => $page_id) )) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Deletes an item
   *
   * @param Int $id  The item id
   *
   * @return array
   */
  public static function deleteItem($id) {
    $db = static::getDB();
    $sql = "DELETE FROM `pages` WHERE `page_id` = :id";
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
    $sql = "DELETE FROM `pages` WHERE `url_id` = :url_id";
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

  /**
   * Deletes an item by item id
   *
   * @param Int $id  The item id
   *
   * @return array
   */
  public static function deleteByItem($item_id) {
    $db = static::getDB();
    $sql = "DELETE FROM `pages` WHERE `item_id` = :item_id";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(':item_id' => $item_id) )) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }
}

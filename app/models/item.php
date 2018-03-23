<?php

namespace app\models;

use PDO;

/**
 * Page model
 *
 * PHP version 7.0
 */
class item extends \core\model
{
  /**
   * Gets an item by id
   *
   * @param int $id  The id
   *
   * @return array
   */
  public static function getItem($id) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT * FROM items WHERE id = :id LIMIT 1");
    try {
      $stmt->execute( array(':id' => $id) );
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
   * Get all items as an associative array
   *
   * @return array
   */
  public static function getItems() {
    $db = static::getDB();
    $sql = "SELECT items.id, items.name, COUNT(pages.page_id) AS count_pages, items.date_created, items.user_id, items.date_modified, items.modified_by FROM `items`\n"
        . "LEFT JOIN pages ON pages.item_id = items.id\n"
        . "GROUP BY items.id";    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Adds a new item
   *
   * @param Array $page  The page params
   *
   * @return id or false
   */
  public static function new($item) {
    $db = static::getDB();
    $sql = "INSERT INTO `items` (`id`, `name`, `title`, `headline`, `subline`, `content`, `user_id`, `date_created`, `date_modified`, `modified_by`) VALUES (NULL, :name, :title, :headline, :subline, :content, :user_id, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :modified_by)";
    $stmt = $db->prepare($sql);
    $params = array(
      ':name' => $item['name'],
      ':title' => $item['title'],
      ':headline' => $item['headline'],
      ':subline' => $item['subline'],
      ':content' => $item['content'],
      ':user_id' => $_SESSION['userId'],
      ':modified_by' => $_SESSION['userId'],
    );
    try {
      $stmt->execute( $params );
      return $db->lastInsertId();
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Edits an item affecteds properties
   *
   * @param Int $id  The item id
   * @param Array $changes  The page params
   *
   * @return boolean
   */
  public static function edit($id, $changes) {
    $db = static::getDB();
    $sql = "UPDATE `items` SET";
    $sql .= " `date_modified` = CURRENT_TIMESTAMP";
    foreach ($changes as $key => $value) {
      $sql .= ", `$key` = :$key";
    }
    $sql .= " WHERE `items`.`id` = $id";
    $stmt = $db->prepare($sql);

    $params = [];
    foreach ($changes as $key => $value) {
      $params[':'.$key] = $value;
    }
    try {
      $stmt->execute( $params );
      return true;
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
    $sql = "DELETE FROM `items` WHERE `id` = :id";
    $stmt = $db->prepare($sql);
    try {
      if ($stmt->execute( array(':id' => $id) )) {
        return $id;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }
}

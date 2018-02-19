<?php

namespace app\models;

use PDO;

/**
 * Page model
 *
 * PHP version 7.0
 */
class page extends \core\model
{

  /**
   * Get a page by URL
   *
   * @param String $url  The url
   *
   * @return array
   */
  public static function getPage($url) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT * FROM pages WHERE url = :url LIMIT 1");
    try {
      $stmt->execute( array(':url' => $url) );
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
   * Get all pages as an associative array
   *
   * @return array
   */
  public static function getPages() {
    $db = static::getDB();
    $stmt = $db->query('SELECT * FROM pages WHERE 1');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Adds a new page
   *
   * @param Array $page  The page params
   *
   * @return id or false
   */
  public static function new($page) {
    $db = static::getDB();
    $sql = "INSERT INTO `pages` (`id`, `name`, `display_name`, `url`, `title`, `headline`, `subline`, `content`, `user_id`, `category_id`, `meta_title`, `meta_desc`, `meta_keywords`, `meta_robots`, `protected`, `date_created`, `date_modified`, `modified_by`) VALUES (NULL, :name, :display_name, :url, :title, :headline, :subline, :content, :user_id, :category_id, :meta_title, :meta_desc, :meta_keywords, :meta_robots, :protected, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :modified_by)";
    $stmt = $db->prepare($sql);
    $params = array(
      ':name' => $page['name'],
      ':display_name' => $page['display_name'],
      ':url' => $page['url'],
      ':title' => $page['title'],
      ':headline' => $page['headline'],
      ':subline' => $page['subline'],
      ':content' => $page['content'],
      ':user_id' => $_SESSION['userId'],
      ':category_id' => $page['category_id'],
      ':meta_title' => $page['meta_title'],
      ':meta_desc' => $page['meta_desc'],
      ':meta_keywords' => $page['meta_keywords'],
      ':meta_robots' => $page['meta_robots'],
      ':protected' => $page['protected'],
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
   * Edits a page affecteds properties
   *
   * @param Int $id  The page id
   * @param Array $changes  The page params
   *
   * @return boolean
   */
  public static function edit($id, $changes) {
    $db = static::getDB();
    $sql = "UPDATE `pages` SET";
    $sql .= " `date_modified` = CURRENT_TIMESTAMP";
    foreach ($changes as $key => $value) {
      $sql .= ", `$key` = :$key";
    }
    $sql .= " WHERE `pages`.`id` = $id";
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
   * Deletes a page
   *
   * @param Int $id  The page id
   *
   * @return array
   */
  public static function deletePage($id) {
    $db = static::getDB();
    $sql = "DELETE FROM `pages` WHERE `id` = :id";
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

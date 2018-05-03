<?php

namespace app\models;

use PDO;

/**
 * url model
 *
 * PHP version 7.0
 */
class url extends \core\model
{

  /**
   * Get a url by URL
   *
   * @param String $url  The url
   *
   * @return array
   */
  public static function getURL($url) {
    $db = static::getDB();
    $sql = "SELECT * FROM `urls`\n"
    . "JOIN templates ON urls.template_id = templates.template_id\n"
    . "WHERE url = :url LIMIT 1";
    $stmt = $db->prepare($sql);
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
   * Get a url by URL
   *
   * @param String $url  The url
   *
   * @return array
   */
  public static function getUrlById($id) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT * FROM urls WHERE id = :id LIMIT 1");
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
   * Get all urls as an associative array
   *
   * @return array
   */
  public static function getURLs() {
    $db = static::getDB();
    $sql = "SELECT * FROM `urls`\n"
    . "JOIN templates ON urls.template_id = templates.template_id\n"
    . "WHERE 1";
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Adds a new url
   *
   * @param Array $url  The url params
   *
   * @return id or false
   */
  public static function new($url) {
    $db = static::getDB();
    $sql = "INSERT INTO `urls` (`id`, `name`, `display_name`, `url`, `headline`, `template_id`, `subline`, `content`, `user_id`, `meta_title`, `meta_desc`, `meta_keywords`, `meta_robots`, `date_created`, `date_modified`, `modified_by`) VALUES (NULL, :name, :display_name, :url, :headline, :template_id, :subline, :content, :user_id, :meta_title, :meta_desc, :meta_keywords, :meta_robots, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :modified_by)";
    $stmt = $db->prepare($sql);
    $params = array(
      ':name' => $url['name'],
      ':display_name' => $url['display_name'],
      ':url' => $url['url'],
      ':headline' => $url['headline'],
      ':template_id' => $url['template_id'],
      ':subline' => $url['subline'],
      ':content' => $url['content'],
      ':user_id' => $_SESSION['userId'],
      ':meta_title' => $url['meta_title'],
      ':meta_desc' => $url['meta_desc'],
      ':meta_keywords' => $url['meta_keywords'],
      ':meta_robots' => $url['meta_robots'],
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
   * Edits a url affecteds properties
   *
   * @param Int $id  The url id
   * @param Array $changes  The url params
   *
   * @return boolean
   */
  public static function edit($id, $changes) {
    $db = static::getDB();
    $sql = "UPDATE `urls` SET";
    $sql .= " `date_modified` = CURRENT_TIMESTAMP";
    foreach ($changes as $key => $value) {
      $sql .= ", `$key` = :$key";
    }
    $sql .= " WHERE `urls`.`id` = $id";
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
   * Deletes a url
   *
   * @param Int $id  The url id
   *
   * @return array
   */
  public static function deleteURL($id) {
    $db = static::getDB();
    $sql = "DELETE FROM `urls` WHERE `id` = :id";
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

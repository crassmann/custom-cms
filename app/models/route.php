<?php

namespace app\models;

use PDO;

/**
 * url model
 *
 * PHP version 7.0
 */
class route extends \core\model
{
  /**
   * Get a route by id
   *
   * @param String $id  The route id
   *
   * @return array
   */
  public static function getRoute($id) {
    $db = static::getDB();
    $sql = "SELECT * FROM `routes`\n"
    . "WHERE route_id = :id LIMIT 1";
    $stmt = $db->prepare($sql);
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
   * Get all templates as an associative array
   *
   * @return array
   */
  public static function getRoutes() {
    $db = static::getDB();
    $sql = "SELECT * FROM `routes`\n"
    . "WHERE 1\n"
    . "ORDER BY `routes`.`route_position`";
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Adds a new route
   *
   * @param Array $route  The route params
   *
   * @return id or false
   */
  public static function new($route) {
    $db = static::getDB();
    $sql = "INSERT INTO `routes` (`route_id`, `route_name`, `route_url`, `route_controller`, `route_action`, `route_params`, `route_namespace`, `route_position`) VALUES (NULL, :route_name, :route_url, :route_controller, :route_action, :route_params, :route_namespace, :route_position)";
    $stmt = $db->prepare($sql);
    $params = array(
      ':route_name' => $route['route_name'],
      ':route_url' => $route['route_url'],
      ':route_controller' => $route['route_controller'],
      ':route_action' => $route['route_action'],
      ':route_params' => $route['route_params'],
      ':route_namespace' => $route['route_namespace'],
      ':route_position' => $route['route_position'],
    );
    try {
      $stmt->execute( $params );
      return $db->lastInsertId();
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Edits a route affecteds properties
   *
   * @param Int $id  The route id
   * @param Array $changes  The url params
   *
   * @return boolean
   */
  public static function edit($id, $changes) {
    $db = static::getDB();
    $sql = "UPDATE `routes` SET";
    $sql .= " `routes`.`route_id` = $id";
    foreach ($changes as $key => $value) {
      $sql .= ", `$key` = :$key";
    }
    $sql .= " WHERE `routes`.`route_id` = $id";
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
   * Deletes a route
   *
   * @param Int $id  The route id
   *
   * @return array
   */
  public static function deleteRoute($id) {
    $db = static::getDB();
    $sql = "DELETE FROM `routes` WHERE `route_id` = :id";
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

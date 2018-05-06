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
    $sql = "INSERT INTO `routes` (`route_id`, `route_name`, `route_url`, `route_controller`, `route_action`, `route_namespace`, `route_position`) VALUES (NULL, :route_name, :route_url, :route_controller, :route_action, :route_namespace, :route_position)";
    $stmt = $db->prepare($sql);
    $params = array(
      ':route_name' => $route['route_name'],
      ':route_url' => $route['route_url'],
      ':route_controller' => $route['route_controller'],
      ':route_action' => $route['route_action'],
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

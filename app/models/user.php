<?php

namespace app\models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class user extends \core\model
{
  /**
   * Configure variables
   * @var mixed
   */
  protected $id;
  protected $name;
  protected $email;
  protected $password;
  protected $role;
  protected $state;
  protected $date_created;
  protected $date_modified;
  protected $last_login;
  protected $failed_attempts;

  /**
   * Get password_hash by email
   *
   * @param String $email  The users email
   *
   * @return string
   */
  public static function getPasswordHash($email) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT password FROM users WHERE email = :email LIMIT 1");
    try {
      $stmt->execute( array(':email' => $email) );
      if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return $result['password'];
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Get the user by id as an associative array
   *
   * @param Int $id  The users id
   *
   * @return array
   */
  public static function getUserById($id) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");

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
   * Get the user by email as an associative array
   *
   * @param String $email  The users email
   *
   * @return array
   */
  public static function getUserByEmail($email) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");

    try {
      $stmt->execute( array(':email' => $email) );
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
   * Get all the users as an associative array
   *
   * @return array
   */
  public static function getUsers() {
    $db = static::getDB();
    $stmt = $db->query('SELECT * FROM users');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Edits a user affecteds properties
   *
   * @param Int $id  The users id
   *
   * @return boolean
   */
  public static function updateLastLogin($id) {
    $db = static::getDB();
    $sql = "UPDATE `users` SET";
    $sql .= " `last_login` = CURRENT_TIMESTAMP";
    $sql .= " WHERE `users`.`id` = :id";
    $stmt = $db->prepare($sql);

    try {
      $stmt->execute( array(':id' => $id) );
      if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Increases failed login attempts
   *
   * @param String $email  The users email
   *
   * @return boolean
   */
  public static function increaseFailedLoginAttempts($email) {
    $db = static::getDB();
    $sql = "UPDATE `users` SET";
    $sql .= " `failed_attempts` = failed_attempts + 1";
    $sql .= " WHERE `users`.`email` = :email";
    $stmt = $db->prepare($sql);

    try {
      $stmt->execute( array(':email' => $email) );
      if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Resets failed login attempts
   *
   * @param Int $id  The users id
   *
   * @return boolean
   */
  public static function resetFailedLoginAttempts($id) {
    $db = static::getDB();
    $sql = "UPDATE `users` SET";
    $sql .= " `failed_attempts` = 0";
    $sql .= " WHERE `users`.`id` = :id";
    $stmt = $db->prepare($sql);

    try {
      $stmt->execute( array(':id' => $id) );
      if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Adds a new user
   *
   * @param Array $user  The user params
   *
   * @return id or false
   */
  public static function new($user) {
    $db = static::getDB();
    $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `state`, `date_created`, `date_modified`) VALUES (NULL, :name, :email, :password, :role, :state, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
    $stmt = $db->prepare($sql);
    $params = array(
      ':name' => $user['name'],
      ':email' => $user['email'],
      ':password' => password_hash($user['password'], PASSWORD_BCRYPT),
      ':role' => $user['role'],
      ':state' => 1,
    );
    try {
      $stmt->execute( $params );
      return $db->lastInsertId();
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Edits a user affecteds properties
   *
   * @param Int $id  The users id
   * @param Array $changes  The params
   *
   * @return boolean
   */
  public static function edit($id, $changes) {
    $db = static::getDB();
    $sql = "UPDATE `users` SET";
    $sql .= " `date_modified` = CURRENT_TIMESTAMP";
    foreach ($changes as $key => $value) {
      $sql .= ", `$key` = :$key";
    }
    $sql .= " WHERE `users`.`id` = $id";
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
   * Deletes a user
   *
   * @param Int $id  The users id
   *
   * @return array
   */
  public static function deleteUser($id) {
    $db = static::getDB();
    $sql = "DELETE FROM `users` WHERE `id` = :id";
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

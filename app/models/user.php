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
  protected $rememberToken;
  protected $role;
  protected $state;
  protected $date_created;
  protected $date_modified;

  /**
   * Get password_hash by email
   *
   * @return string
   */
  public static function getPasswordHash($email) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT password FROM users WHERE email = :email LIMIT 1");
    $stmt->execute( array(':email' => $email) );
    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $result['password'];
    } else {
      return false;
    }
  }

  /**
   * Get the user by id as an associative array
   *
   * @return array
   */
  public static function getUserById($id) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
    $stmt->execute( array(':id' => $id) );
    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return false;
    }
  }

  /**
   * Get the user by email as an associative array
   *
   * @return array
   */
  public static function getUserByEmail($email) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $stmt->execute( array(':email' => $email) );
    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
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
   * Adds a new user
   *
   * @return id or false
   */
  public static function new($user) {
    $bytes = openssl_random_pseudo_bytes(20);
    $hex = bin2hex($bytes);
    $salt = base64_encode($hex);

    $db = static::getDB();
    $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `state`, `date_created`, `date_modified`) VALUES (NULL, :name, :email, :password, :remember_token, :role, :state, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
    $stmt = $db->prepare($sql);
    $params = array(
      ':name' => $user['name'],
      ':email' => $user['email'],
      ':password' => md5($user['password']),
      ':remember_token' => $salt,
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
   * @return array
   */
  public static function deleteUser($id) {
    $db = static::getDB();
    $sql = "DELETE FROM `users` WHERE `id` = :id";
    $stmt = $db->prepare($sql);
    if ($stmt->execute( array(':id' => $id) )) {
      return $id;
    } else {
      return false;
    }
  }
}

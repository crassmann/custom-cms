<?php
namespace app\models;

use app\config;
use PDO;

/**
 * Cookie class
 *
 * PHP version 7.0
 */
class auth extends \core\model
{

  /**
   * Set Auth Token
   *
   * @return boolean
   */
  public static function addAuth($user_id) {
    $selector = static::generateToken(config::SELECTOR_LENGTH);
    $validator = static::generateToken(config::TOKEN_LENGTH);
    $hashed_validator = hash('sha256', $validator);
    $expires = mktime(0, 0, 0, date("m"), date("d")+config::COOKIE_LIFETIME, date("Y"));
    $dbExpires = date("Y-m-d h:i:s", $expires);
    $remember_me = $selector."#".$validator;
    if ($auth_token = static::addAuthToken($selector, $hashed_validator, $user_id, $dbExpires))
    {
      setcookie("rememberMe", $remember_me, $expires);
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Generate Token
   *
   * @return array
   */
  private static function generateToken($length = config::TOKEN_LENGTH)
  {
    return bin2hex(random_bytes($length));
  }

  /**
   * Adds a new auth_token
   *
   * @return id or false
   */
  private static function addAuthToken($selector, $hashed_validator, $user_id, $expires) {
    $db = static::getDB();
    $sql = "INSERT INTO `auth_tokens` (`id`, `selector`, `hashed_validator`, `user_id`, `expires`) VALUES (NULL, :selector, :hashed_validator, :user_id, :expires)";
    $stmt = $db->prepare($sql);
    $params = array(
      ':selector' => $selector,
      ':hashed_validator' => $hashed_validator,
      ':user_id' => $user_id,
      ':expires' => $expires,
    );
    try {
      $stmt->execute( $params );
      return $db->lastInsertId();
    } catch (\Exception $e) {
      return $e;
    }
  }

  /**
   * Check Auth Cookie
   *
   * @return array or false
   */
  public static function checkAuthToken($c) {
    // Separate selector from validator
    $cookie = explode("#", $c);
    $selector = $cookie[0];
    $validator = $cookie[1];

    // Grab the row in auth_tokens for the given selector. If none is found, abort
    if ($auth_token = static::getAuthTokenBySelector($selector)) {
      // Hash the validator provided by the user's cookie with SHA-256
      $hashed_validator = hash('sha256', $validator);

      // Compare the SHA-256 hash we generated with the hash stored in the database, using hash_equals()
      // If step passes, associate the current session with the appropriate user ID
      if (hash_equals($hashed_validator, $auth_token['hashed_validator'])) {
        if ($auth_token['expires'] > date("Y-m-d- h:m:s")) {
          return $auth_token;
        } else {
          static::removeAuthTokenBySelector($selector);
          return false;
        }
      }
    }
    return false;
  }

  /**
   * Grab the row in auth_tokens for the given selector as an associative array
   *
   * @return array or false
   */
  private static function getAuthTokenBySelector($selector) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT * FROM auth_tokens WHERE selector = :selector LIMIT 1");
    $stmt->execute( array(':selector' => $selector) );
    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $result;
    } else {
      return false;
    }
  }

  /**
   * Remove Auth Token by selector
   *
   * @return boolean
   */
  public static function removeAuthTokenBySelector($selector) {
    $db = static::getDB();
    $sql = "DELETE FROM `auth_tokens` WHERE `selector` = :selector";
    $stmt = $db->prepare($sql);
    if ($stmt->execute( array(':selector' => $selector) )) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Count rows on match
   *
   * @return boolean
   */
  public static function getAuthTokenByUserId($user_id) {
    $db = static::getDB();
    $stmt = $db->prepare("SELECT COUNT(*) as count FROM auth_tokens WHERE user_id = :user_id");
    $stmt->execute( array(':user_id' => $user_id) );
    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $result['count'];
    } else {
      return false;
    }
  }

  /**
   * Remove Auth Token by Id
   *
   * @return boolean
   */
  public static function removeAuthTokenByUserId($user_id) {
    $db = static::getDB();
    $sql = "DELETE FROM `auth_tokens` WHERE `user_id` = :user_id";
    $stmt = $db->prepare($sql);
    if ($stmt->execute( array(':user_id' => $user_id) )) {
      if ( isset( $_COOKIE["rememberMe"] ) ) {
        setcookie( "rememberMe", 0, 1);
      }
      return true;
    } else {
      return false;
    }
  }

  /**
   * Remove Cookie
   *
   * @return boolean
   */
  public static function removeAuthCookie() {
    if ( isset( $_COOKIE["rememberMe"] ) ) {
      setcookie( "rememberMe", 0, 1);
    }
  }
}
?>

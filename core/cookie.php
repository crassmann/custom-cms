<?php
namespace core;

use PDO;
use app\config;

/**
 * Cookie class
 *
 * PHP version 7.0
 */
class cookie extends model
{
  /**
   * Session Parameters
   * @var array
   */
  public $cookie;

  /**
   * Cookie constructor
   *
   * @return void
   */
  public function __construct() {
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
   * Grab the row in auth_tokens for the given selector as an associative array
   *
   * @return array
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
   * Adds a new auth_token
   *
   * @return id or false
   */
  public static function addAuthToken($selector, $hashed_validator, $user_id, $expires) {
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
   * Set Auth Cookie
   *
   * @return void
   */
  public static function addAuthCookie($user_id) {
    $selector = static::generateToken(config::SELECTOR_LENGTH);
    $validator = static::generateToken(config::TOKEN_LENGTH);
    $hashedValidator = hash('sha256', $validator);
    $expires = mktime(0, 0, 0, date("m"), date("d")+config::COOKIE_LIFETIME, date("Y"));
    $remember_me = $selector."#".$validator;
    if ($auth_token = static::addAuthToken($selector, $hashedValidator, $user_id, $expires))
    {
      setcookie("rememberMe", $remember_me, $expires);
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Check Auth Cookie
   *
   * @return void
   */
  public static function checkAuthCookie($c) {
    // Separate selector from validator
    $cookie = explode("#", $c);
    $selector = $cookie[0];
    $validator = $cookie[1];

    // Grab the row in auth_tokens for the given selector. If none is found, abort
    if ($auth_token = static::getAuthTokenBySelector($selector)) {
      // Hash the validator provided by the user's cookie with SHA-256
      $hashedValidator = hash('sha256', $validator);

      // Compare the SHA-256 hash we generated with the hash stored in the database, using hash_equals()
      // If step passes, associate the current session with the appropriate user ID
      if (hash_equals($hashedValidator, $auth_token['hashed_validator'])) {
        return $auth_token;
      } else {
        return false;
      }
    }
  }

}
?>
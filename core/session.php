<?php

namespace core;

use PDO;

// DB table structure
/*
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `ip` varchar(15) collate utf8_unicode_ci NOT NULL default '',
  `agent` varchar(200) collate utf8_unicode_ci NOT NULL default '',
  `fingerprint` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `start` int(20) NOT NULL default '0',
  `last_updated` int(20) NOT NULL default '0',
  `data` mediumtext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`,`fingerprint`,`ip`,`agent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

*/

// Class
class session extends model {

	// Variables
	private $db;
	private $table;
	private $salt;
	private $ip;
	private $geoipcode;
	private $countrycode;
	private $agent;
	private $fingerprint;
	private $location;
	private $domain;
	private $lifetime;
	private $sessionId;
	private $stime;

	// Constructor
	function __construct() {

		// Configure Variables
		$this->db = static::getDB();
		$this->table = "sessions";
		$this->salt = "3d3c704f2780b2b086152e8e4dcfbf7caf2bcd748c0f0edc42aa120793030c00";
		$this->ip = $_SERVER['REMOTE_ADDR'];
		if (isset($_SERVER['HTTP_USER_AGENT'])) {
			$this->agent = $_SERVER['HTTP_USER_AGENT'];
		}
		else {
			$this->agent = "";
		}
		$this->fingerprint = md5( $this->salt . $this->ip . $this->agent );

		$this->location = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'];
		$this->domain = str_replace('www.', '', $_SERVER['HTTP_HOST']);

		// Configure Session parameter (php.ini)
		ini_set( 'session.auto_start', 0 ); // Defines whether the session module starts a session automatically on request startup [Default: '0']
		ini_set( 'session.name', 'PHPSESSID' ); // Defines the name of the session which is used as cookie name; it should only contain alphanumeric characters [Default: 'PHPSESSID']
		ini_set( 'session.save_handler', 'user' ); // Defines the name of the handler which is used for storing and retrieving data associated with a session [Default: 'files']
		ini_set( 'session.gc_probability', 1 ); // Conjunction with session.gc_divisor is used to manage probability that the garbage collection routine is started [Default: '1']
		ini_set( 'session.gc_divisor', 50 ); // Coupled with session.gc_probability defines the probability that the garbage collection process is started on every session initialization [Default: '100']
		ini_set( 'session.gc_maxlifetime', 30*60 ); // Defines the number of seconds after which data will be seen as 'garbage' and potentially cleaned up [Depending on session.gc_probability and session.gc_divisor]
		ini_set( 'session.use_cookies', 1 ); // Enable ('1') / Disable ('0') cookies to store the session id on the client side [Default: '1']
		ini_set( 'session.use_only_cookies', 1 ); // Enable ('1') / Disable ('0') to use ONLY cookies to store the session id on the client side [Default: '1']
		ini_set( 'session.use_trans_sid', 0 ); // Enable ('1') / Disable ('0') transparent sid support [Default: '0']
		ini_set( 'session.referer_check', '' ); // Contains the substring you want to check each HTTP Referer for [Default: empty string]
		ini_set( 'session.hash_function', 1 ); // Defines the hash algorithm used to generate the session ID ['0' = MD5 (128 bits) / '1' = SHA-1 (160 bits)]
		ini_set( 'session.hash_bits_per_character', 6 ); // Defines how many bits are stored in each character when converting the binary hash data to something readable [Possible values are '4', '5' or '6']

		// Set Lifetime
		$this->lifetime = ini_get('session.gc_maxlifetime');

		session_cache_limiter( 'nocache' ); // Specifies the cache control method ('nocache', 'private', 'private_no_expire', or 'public') used for session pages [Default: 'nocache']
		session_set_cookie_params( // Set cookie parameters defined in the php.ini file. You need to call session_set_cookie_params() for every request and before session_start() is called.
								 $this->lifetime, // Lifetime of the session cookie, defined in seconds [int $lifetime]
								 '/', // Path on the domain where the cookie will work. Use a single slash ('/') for all paths on the domain [string $path]
								 $this->domain // Cookie domain, for example 'www.php.net'. To make cookies visible on all subdomains then the domain must be prefixed with a dot like '.php.net' [string $domain]
								 );

		// Set session handler
		session_set_save_handler(
			array( &$this, 'open' ),
			array( &$this, 'close' ),
			array( &$this, 'read' ),
			array( &$this, 'write' ),
			array( &$this, 'destroy' ),
			array( &$this, 'clean' )
		);

		// Start session
		session_start();
		$this->sessionId = session_id();
		$_SESSION["sid"] = $this->sessionId;
		$_SESSION["time"] = time();
		$this->stime = date("Y-m-d H:i:s");
		$_SESSION["datetime"] = $this->stime;

	} // End Constructor


    // open: Check DB connection
    function open() {
			return true;
	} // End open


	// close: Close DB connection
    function close() {
			return true;
	} // End close


    // read: Read session data
    function read( $id ) {

			$stmt = $this->db->prepare( "SELECT data FROM " . $this->table . " WHERE id = :id AND fingerprint = :fingerprint" );
			$stmt->execute( array( ':id' => $id, ':fingerprint' => $this->fingerprint ) );
			$data = $stmt->fetchAll( PDO::FETCH_ASSOC );

			if ( count( $data ) > 0 ) {
				return isset( $data[0] ['data'] ) ? $data[0] ['data'] : '';
			}
			else {
				return '';
			}

		} // End read


  // write: Write session data
	function write( $id, $data ) {

		$stmt = $this->db->prepare( "REPLACE INTO " . $this->table . " ( id, ip, agent, fingerprint, start, last_updated, data ) VALUES ( :id, :ip, :agent, :fingerprint, :start, :last_updated, :data )" );
		$stmt->execute( array( ':id' => $id, ':ip' => $this->ip, ':agent' => $this->agent, ':fingerprint' => $this->fingerprint, ':start' => $this->stime, ':last_updated' => time(), ':data' => $data ) );

		return true;

	} // End write


  // destroy: Destroy session data
	function destroy( $id ) {

		// Invalidate cookie
		if ( isset( $_COOKIE[session_name()] ) ) {
			setcookie( session_name(), 0, 1, '/', $this->domain);
		}
		if ( isset( $_COOKIE["user"] ) ) {
			setcookie( "user", 0, 1, '/', $this->domain);
		}
		if ( isset( $_COOKIE["hash"] ) ) {
			setcookie( "hash", 0, 1, '/', $this->domain);
		}
		if ( isset( $_COOKIE["userHash"] ) ) {
			setcookie( "userHash", 0, 1, '/', $this->domain);
		}
		if ( isset( $_COOKIE["rememberMe"] ) ) {
			setcookie( "rememberMe", 0, 1, '/', $this->domain);
		}

		session_write_close();
		session_unset();

		$stmt = $this->db->prepare( "DELETE FROM " . $this->table . " WHERE id = :id" );
		$stmt->execute( array( ':id' => $id ) );

		return true;

	} // End destroy


	//clean: Clean sessions
	function clean( $max ) {

		$max = time()-$this->lifetime;

		$stmt = $this->db->prepare( "DELETE FROM " . $this->table . " WHERE last_updated < :max" );
		$stmt->execute( array( ':max' => $max ) );

		return true;

	} // End clean

} // End session class

?>

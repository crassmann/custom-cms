<?php

namespace app;

use PDO;
/**
 * Application configuration
 *
 * PHP version 7.0
 */
class config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'custom-cms';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'b9HWoPPqZ8wGrb2x';

    /**
     * Database charset
     * @var string
     */
    const DB_CHARSET = 'utf8';

    /**
     * Database options
     * @var array
     */
    const DB_OPTIONS = [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    /**
     * Define the length of the Token
     * @var int
     */
    const TOKEN_LENGTH = 20;

    /**
     * Define the length of the selector
     * @var int
     */
    const SELECTOR_LENGTH = 6;
    /**
     * Define the lifetime of the cookies
     * @var int
     */
    const COOKIE_LIFETIME = 30; // 30 Tage

    /**
     * Set app dir if it's not root
     * @var boolean
     */
    const ROOT_APP_DIR = '/projects/custom-cms/';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true; // false

    /**
     * Show or hide error messages on screen
     * @var string
     */
    const LOG_DIR = 'logs/app'; // Dir to log errors if SHOW_ERRORS = false
}

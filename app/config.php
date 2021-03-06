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
    const DB_HOST = '';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = '';

    /**
     * Database user
     * @var string
     */
    const DB_USER = '';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '';

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
     * Set log dir to log error messages if SHOW_ERRORS = false
     * @var string
     */
    const LOG_DIR = '/bin/app/logs/'; // Dir to log errors if SHOW_ERRORS = false

    /**
     * Set the default template
     * @var string
     */
    const DEFAULT_TEMPLATE = 'default'; // Default Template

    /**
     * Define the max no of login attempts
     * @var int
     */
    const MAX_LOGIN_ATTEMPTS = 5;

    /**
     * Define the length of the token
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

}

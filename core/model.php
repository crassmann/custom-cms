<?php

namespace core;

use PDO;
use app\config;

/**
 * Base model
 *
 * PHP version 7.0
 */
abstract class model
{

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . config::DB_HOST . ';dbname=' . config::DB_NAME . ';charset='. config::DB_CHARSET;
            $db = new PDO($dsn, config::DB_USER, config::DB_PASSWORD, config::DB_OPTIONS);
        }

        return $db;
    }
}

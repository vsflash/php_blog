<?php

namespace app\core;

use PDO;

class Db
{

    private static $_instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }


    private function __wakeup()
    {
    }

    /**
     * @return PDO
     */
    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }

        $params = require 'app/config/db.php';
        return self::$_instance = new PDO(
            $params['dsn'],
            $params['username'],
            $params['password'],
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            ]
        );
    }
}
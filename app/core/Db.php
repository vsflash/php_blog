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
     * Get instance
     * @param $dsn
     * @param $username
     * @param $password
     * @return null|PDO
     */
    public static function getInstance($dsn, $username, $password)
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }

        return self::$_instance = new PDO(
            $dsn,
            $username,
            $password,
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            ]
        );
    }
}
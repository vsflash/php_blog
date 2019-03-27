<?php

namespace app\core;

use \PDO;

abstract class Model {

    protected $db;

    /**
     *
     * @var PDO
     */
    public function __construct() {
        $host = 'localhost';
        $user = 'root';
        $password = 'root';
        $db = 'php_blog';
        $this->db = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
    }
}
<?php

namespace app\core;

class Model
{

    protected $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $params = require 'app/config/db.php';

        $this->db = Db::getInstance($params['dsn'], $params['username'], $params['password']);
    }
}
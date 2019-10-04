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
        $this->db = Db::getInstance();
    }
}
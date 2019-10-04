<?php

namespace app\core;
use app\core\View;

abstract class Controller {
    /**
     *
     * @var Model
     */
    public $model;

    /**
     *
     * @var View
     */
    public $view;

    /**
     * Controller constructor.
     */
    public function __construct() {
        $this->view = new View();
    }

    abstract public function action_index();
}


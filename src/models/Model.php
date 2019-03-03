<?php

require_once __DIR__ . '/Database.php';

abstract class Model {

    protected $database;

    public function __construct() {
        $this->database = new Database();
    }

}

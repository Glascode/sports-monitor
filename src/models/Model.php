<?php

/**
 * Model Class
 *
 * Creates a new instance of the Database class.
 *
 * The Model class is an abstract class that creates
 * a new instance of the Database class, allowing us
 * to interact with the database without having to create
 * a new instance in each class.
 */
abstract class Model {

    protected $database;

    public function __construct() {
        $this->database = new Database();
    }

}

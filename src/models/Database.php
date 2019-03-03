<?php

class Database {

    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $dsn = PDO_DSN;

    private $handler;
    private $error;

    private $statement;

    /**
     * Initialises the PDO connection. Sets the handler as
     * the new instance to be used throughout each additional
     * function.
     */
    public function __construct() {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->handler = new PDO($this->dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    /**
     * Prepares a statement.
     */
    public function query($query) {
        $this->statement = $this->handler->prepare($query);
    }

    /**
     * Binds the variables to the proper type. Allows
     * for integer, string, null, and boolean.
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    /**
     * Executes a prepared statement.
     */
    public function execute() {
        try {
            return $this->statement->execute();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    /**
     * Fetches a single row as a result of a query.
     */
    public function result() {
        $this->execute();

        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Fetches a set of rows as a result of a query.
     */
    public function resultset() {
        $this->execute();

        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Gets the row count of the statement.
     */
    public function rowCount() {
        return $this->statement->rowCount();
    }

    /**
     * Gets the id of the last inserted item into the database.
     */
    public function lastInsertId() {
        return $this->handler->lastInsertId();
    }
}
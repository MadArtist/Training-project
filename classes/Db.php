<?php

class db
{
    private $connection;
    private $host = "127.0.0.1";
    private $user = "root";
    private $pass = "password";
    private $database = "training";
    private static $instance;

    private function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->database);

        if ($this->connection->connect_error) {
            die('Connect Error (' . $this->connection->connect_errno . ') '
                . $this->connection->connect_error);
        }
    }

    public static function getInstance()
    {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone() { }

    public function getConnection() {
        return $this->connection;
    }

}
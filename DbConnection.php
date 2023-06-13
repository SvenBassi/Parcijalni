<?php

class DbConnection {
    private static $instance = null;
    private $connection;

    private function __construct($config) {

        try {
            $this->connection = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['password']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error prilikom spajanja na bazu' . $e->getMessage();
        }

    }

    public static function getInstance($config) {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
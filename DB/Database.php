<?php

class Database {

    private $DBHost = "localhost";
    private $DBUser = "root";
    private $DBPassword = "";
    private $DBName = "szallasblog";
    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            die("DB Connection Failed" . $e->getMessage());
        }
    }
}

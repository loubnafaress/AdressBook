<?php
require_once '../Models/dbconfig.php';

    class Database {
        private $host = 'localhost';
        private $name = 'root';
        private $password = '';
        private $database = 'adressbookdb';
        private $pdo;

        public function connect() {
            try {
                $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
                $pdo = new PDO($dsn, $this->user, $this->password);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo; 
            }
            catch(PDOException $e) {
                throw new Exception("Failed to connect to the database." . $e->getMessage());
            }
        }
    }
?>
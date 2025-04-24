<?php
require_once '../Models/ClassContact_Address.php';
require_once '../Models/dbconnectie.php';
require_once '../Models/dbconfig.php';

// Maak een nieuw Contact object aan
$contact = new CreateContact('John', 'Doe', 'john.doe@example.com', '123456789');

// Maak een databaseverbinding
$host = 'localhost';
$db   = 'adressbookdb';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Roep de create-functie aan om het contact op te slaan in de database
$contact->create($pdo);
?>
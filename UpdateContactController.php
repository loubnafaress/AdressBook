<?php
require '../Models/ClassContact_Address.php';
require_once '../Models/DeleteContactModel.php';

// Maak een nieuw UpdateContact object aan
$contact = new UpdateContact(1, 'John', 'Doe', 'john.doe@example.com', '123456789');

// Maak een databaseverbinding
require '../Models/ClassContact_Address.php';
require_once '../Models/DeleteContactModel.php';

// Maak een nieuw UpdateContact object aan
$contact = new UpdateContact(1, 'John', 'Doe', 'john.doe@example.com', '123456789');

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

// Roep de contactUpdate-functie aan om de contactgegevens bij te werken in de database
$contact->contactUpdate($pdo, 'Jane', 'Doe', 'jane.doe@example.com', '987654321');

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

// Roep de contactUpdate-functie aan om de contactgegevens bij te werken in de database
$contact->contactUpdate($pdo, 'Jane', 'Doe', 'jane.doe@example.com', '987654321');
?>
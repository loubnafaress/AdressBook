<?php
require_once '../Models/ClassContact_Address.php';
require_once '../Models/dbconnectie.php';

// Maak een nieuw UpdateAddress object aan
$address = new UpdateAddress(1, 'Kerkstraat', 'Amsterdam', '1017 GN', 'Nederland');

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

// Roep de addressUpdate-functie aan om de adresgegevens bij te werken in de database
$address->addressUpdate($pdo, 'Nieuwe Straat', 'Nieuwe Stad', '1234 AB', 'Nieuw Land');
?>
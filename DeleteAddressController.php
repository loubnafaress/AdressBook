<?php
// Databaseverbinding
require '../Models/dbconnectie.php';
require_once '../Models/dbconfig.php';
require '../Models/DeleteAddressModel.php';

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

$deleteAddress = new DeleteAddress($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['address_id'])) {
        $address_id = $_POST['address_id'];

        if (isset($_POST['confirm_delete'])) {
            // Verwijder het adres
            $deleteAddress->deleteConfirmedAddress($address_id);
        } else {
            // Haal de adresgegevens op en vraag bevestiging voor verwijderen
            $deleteAddress->addressDelete($address_id);
        }
    } else {
        echo "Geen adres-ID opgegeven.";
    }
} else {
    echo "Formulier is niet ingediend.";
}
?>
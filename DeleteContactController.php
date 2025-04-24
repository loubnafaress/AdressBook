<?php
require '../Models/dbconnectie.php';
require_once '../Models/dbconfig.php';
require '../Models/DeleteContactModel.php';

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

$deleteContact = new DeleteContact($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['contact_id'])) {
        $contact_id = $_POST['contact_id'];

        if (isset($_POST['confirm_delete'])) {
            // Verwijder het contact
            $deleteContact->deleteConfirmedContact($contact_id);
        } else {
            // Haal de contactgegevens op en vraag bevestiging voor verwijderen
            $deleteContact->contactDelete($contact_id);
        }
    } else {
        echo "Geen contact-ID opgegeven.";
    }
} else {
    echo "Formulier is niet ingediend.";
}
?>
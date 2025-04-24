<?php
require_once "../Models/dbconnectie.php";

class ReadContact extends Database {
    public static function contactRead() {
        try {
            $pdo = self::getConnection(); // Verkrijg de PDO-verbinding

            // Query om alle contactgegevens op te halen
            $sql = "SELECT * FROM contact";

            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Uitvoeren van de query
            $stmt->execute();

            // Ophalen van alle resultaten als een associatieve array
            $contacten = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Afdrukken van de contactgegevens
            foreach($contacten as $contact){
                echo "Contact ID: " . $contact['contact_id'] . "\n";
                echo "Voornaam: " . $contact['voornaam'] . "\n";
                echo "Achternaam: " . $contact['achternaam'] . "\n";
                echo "E-mail: " . $contact['email'] . "\n";
                echo "Telefoon: " . $contact['telefoon'] . "\n";
                echo "--------------------\n";
            }
        } catch(PDOException $e) {
            die("Fout bij het lezen van contactgegevens: " . $e->getMessage());
        }
    }

    public static function contactReadTable() {
        try {
            $pdo = self::getConnection(); // Verkrijg de PDO-verbinding

            // Query om alle contactgegevens op te halen
            $sql = "SELECT * FROM contact";

            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Uitvoeren van de query
            $stmt->execute();

            // Ophalen van alle resultaten als een associatieve array
            $contacten = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Controleer of er contactgegevens zijn om weer te geven
            if (count($contacten) > 0) {
                echo "<h1>Contactgegevens</h1>";
                echo "<table border='1'>";
                echo "<tr><th>Contact ID</th><th>Voornaam</th><th>Achternaam</th><th>E-mail</th><th>Telefoon</th></tr>";

                foreach ($contacten as $contact) {
                    echo "<tr>";
                    echo "<td>" . $contact['contact_id'] . "</td>";
                    echo "<td>" . $contact['voornaam'] . "</td>";
                    echo "<td>" . $contact['achternaam'] . "</td>";
                    echo "<td>" . $contact['email'] . "</td>";
                    echo "<td>" . $contact['telefoon'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "Geen contactgegevens gevonden.";
            }
        } catch (PDOException $e) {
            die("Fout bij het lezen van contactgegevens: " . $e->getMessage());
        }
    }
}
?>
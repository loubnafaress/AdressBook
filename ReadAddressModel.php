<?php
require_once "../Models/dbconnectie.php";

class ReadAddress extends Database {
    public static function addressRead() {
        try {
            $pdo = Database::getConnection(); // Verkrijg de PDO-verbinding

            // Query om alle adressgegevens op te halen
            $sql = "SELECT * FROM address";

            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Uitvoeren van de query
            $stmt->execute();

            // Ophalen van alle resultaten als een associatieve array
            $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Afdrukken van de adressgegevens
            foreach ($addresses as $address) {
                echo "Address ID: " . $address['address_id'] . "\n";
                echo "Straat: " . $address['straat'] . "\n";
                echo "Stad: " . $address['stad'] . "\n";
                echo "Postcode: " . $address['postcode'] . "\n";
                echo "Land: " . $address['land'] . "\n";
                echo "--------------------\n";
                echo "<br/>";
            }
        } catch (PDOException $e) {
            die("Fout bij het lezen van adressgegevens: " . $e->getMessage());
        }
    }

    public static function addressReadTable() {
        try {
            $pdo = Database::getConnection(); // Verkrijg de PDO-verbinding

            // Query om alle adressgegevens op te halen
            $sql = "SELECT * FROM address";

            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Uitvoeren van de query
            $stmt->execute();

            // Ophalen van alle resultaten als een associatieve array
            $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Controleer of er adressgegevens zijn om weer te geven
            if (count($addresses) > 0) {
                echo "<h1>Adressgegevens</h1>";
                echo "<table border='1'>";
                echo "<tr><th>Adress ID</th><th>Straat</th><th>Stad</th><th>Postcode</th><th>Land</th></tr>";

                foreach ($addresses as $address) {
                    echo "<tr>";
                    echo "<td>" . $address['address_id'] . "</td>";
                    echo "<td>" . $address['straat'] . "</td>";
                    echo "<td>" . $address['stad'] . "</td>";
                    echo "<td>" . $address['postcode'] . "</td>";
                    echo "<td>" . $address['land'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "Geen adressgegevens gevonden.";
            }
        } catch (PDOException $e) {
            die("Fout bij het lezen van adressgegevens: " . $e->getMessage());
        }
    }
}
?>
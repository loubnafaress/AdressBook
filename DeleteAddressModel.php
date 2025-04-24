<?php
require_once "../Models/dbconnectie.php";

class DeleteAddress extends Database {
    // Methode om adresgegevens op te halen en te tonen
    public function addressDelete($contact_id) {
        try {
            // Query om adresgegevens op te halen op basis van contact-ID
            $sql = "SELECT * FROM address WHERE contact_id = :contact_id";

            // Voorbereiden van de SQL-query
            $stmt = $this->pdo->prepare($sql);

            // Binden van de contact-ID aan de query
            $stmt->bindParam(':contact_id', $contact_id, PDO::PARAM_INT);

            // Uitvoeren van de query
            $stmt->execute();

            // Ophalen van adresgegevens als een associatieve array
            $address = $stmt->fetch(PDO::FETCH_ASSOC);

            // Controleer of adresgegevens zijn gevonden
            if ($address) {
                echo "Adresgegevens gevonden:<br>";
                echo "Adres ID: " . $address['address_id'] . "<br>";
                echo "Straat: " . $address['street'] . "<br>";
                echo "Stad: " . $address['city'] . "<br>";
                echo "Postcode: " . $address['postcode'] . "<br>";
                echo "Land: " . $address['country'] . "<br>";

                // Vraag of de gebruiker de gegevens wil verwijderen
                echo "<br>";
                echo "Weet je zeker dat je deze adresgegevens wilt verwijderen?";
                echo "<form action='DeleteAddressController.php' method='post'>";
                echo "<input type='hidden' name='address_id' value='" . $address['address_id'] . "'>";
                echo "<input type='submit' name='confirm_delete' value='Ja, verwijder'>";
                echo "</form>";
            } else {
                echo "Adresgegevens met opgegeven ID niet gevonden.";
            }
        } catch(PDOException $e) {
            die("Fout bij het ophalen van adresgegevens: " . $e->getMessage());
        }
    }

    // Methode om adresgegevens te verwijderen
    public function deleteConfirmedAddress($address_id) {
        try {
            // Query om adresgegevens te verwijderen op basis van adres-ID
            $sql = "DELETE FROM address WHERE address_id = :address_id";

            // Voorbereiden van de SQL-query
            $stmt = $this->pdo->prepare($sql);

            // Binden van de adres-ID aan de query
            $stmt->bindParam(':address_id', $address_id, PDO::PARAM_INT);

            // Uitvoeren van de query
            $stmt->execute();

            echo "Adresgegevens zijn succesvol verwijderd.";

        } catch (PDOException $e) {
            die("Fout bij het verwijderen van adresgegevens: " . $e->getMessage());
        }
    }
}
?>
<?php
class DeleteContact extends Database {
    // Methode om contactgegevens te verwijderen op basis van contact-ID
    public function contactDelete($contact_id) {
        try {
            // Query om contactgegevens op te halen op basis van contact-ID
            $sql = "SELECT * FROM contacts WHERE contact_id = :contact_id";

            // Voorbereiden van de SQL-query
            $stmt = $this->pdo->prepare($sql);

            // Binden van de contact-ID aan de query
            $stmt->bindParam(':contact_id', $contact_id, PDO::PARAM_INT);

            // Uitvoeren van de query
            $stmt->execute();

            // Ophalen van contactgegevens als een associatieve array
            $contact = $stmt->fetch(PDO::FETCH_ASSOC);

            // Controleer of contactgegevens zijn gevonden
            if ($contact) {
                echo "Contactgegevens gevonden:<br>";
                echo "Contact ID: " . $contact['contact_id'] . "<br>";
                echo "Voornaam: " . $contact['first_name'] . "<br>";
                echo "Achternaam: " . $contact['last_name'] . "<br>";
                echo "E-mail: " . $contact['email'] . "<br>";
                echo "Telefoon: " . $contact['phone'] . "<br>";

                // Vraag of de gebruiker de gegevens wil verwijderen
                echo "<br>";
                echo "Weet je zeker dat je deze contactgegevens wilt verwijderen?";
                echo "<form action='DeleteContactController.php' method='post'>";
                echo "<input type='hidden' name='contact_id' value='" . $contact_id . "'>";
                echo "<input type='submit' name='confirm_delete' value='Ja, verwijder'>";
                echo "</form>";
            } else {
                echo "Contactgegevens met opgegeven ID niet gevonden.";
            }

        } catch (PDOException $e) {
            die("Fout bij het ophalen van contactgegevens: " . $e->getMessage());
        }
    }

    // Methode om contactgegevens te verwijderen
    public function deleteConfirmedContact($contact_id) {
        try {
            // Query om contactgegevens te verwijderen op basis van contact-ID
            $sql = "DELETE FROM contacts WHERE contact_id = :contact_id";

            // Voorbereiden van de SQL-query
            $stmt = $this->pdo->prepare($sql);

            // Binden van de contact-ID aan de query
            $stmt->bindParam(':contact_id', $contact_id, PDO::PARAM_INT);

            // Uitvoeren van de query
            $stmt->execute();

            echo "Contactgegevens zijn succesvol verwijderd.";

        } catch (PDOException $e) {
            die("Fout bij het verwijderen van contactgegevens: " . $e->getMessage());
        }
    }
}
?>
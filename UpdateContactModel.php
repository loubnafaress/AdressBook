<?php
require '../Models/ClassContact_Address.php';
require_once '../Models/DeleteContactModel.php';

class UpdateContact extends Database {
    private $contactID;
    private $Voornaam;
    private $Achternaam;
    private $Email;
    private $Telefoon;

    public function __construct($contact_id, $first_name, $last_name, $email, $phone) {
        $this->contactID = $contact_id;
        $this->Voornaam = $first_name;
        $this->Achternaam = $last_name;
        $this->Email = $email;
        $this->Telefoon = $phone;
    }

    public function contactUpdate($pdo, $newFirst_name, $newLast_name, $newEmail, $newPhone) {
        $this->Voornaam = $newFirst_name;
        $this->Achternaam = $newLast_name;
        $this->Email = $newEmail;
        $this->Telefoon = $newPhone;

        try {
            // Query om Contactgegevens bij te werken in de database
            $sql = "UPDATE contact SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone WHERE contact_id = :contact_id";
            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Binden van de parameters aan de query
            $stmt->bindParam(':first_name', $this->Voornaam, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $this->Achternaam, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->Email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $this->Telefoon, PDO::PARAM_STR);
            $stmt->bindParam(':contact_id', $this->contactID, PDO::PARAM_INT);

            // Uitvoeren van de query
            $stmt->execute();

            echo "Contactgegevens zijn succesvol bijgewerkt naar: " . $this->Voornaam . " " . $this->Achternaam . " " . $this->Email . " " . $this->Telefoon . "\n";
        } catch(PDOException $e) {
            die("Fout bij het bijwerken van contactgegevens: " . $e->getMessage());
        }
    }
}
?>
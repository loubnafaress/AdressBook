<?php
require_once '../Models/ClassContact_Address.php';
require_once '../Models/dbconnectie.php';
require_once '../Models/dbconfig.php';

class CreateContact extends Contact {
    public function create($pdo) {
        try {
            // Query om Contactgegevens toe te voegen aan de database
            $sql = "INSERT INTO contact (first_name, last_name, email, phone) VALUES (:first_name, :last_name, :email, :phone)";
            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Binden van de parameters aan de query
            $stmt->bindParam(':first_name', $this->first_name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $this->last_name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);

            // Uitvoeren van de query
            $stmt->execute();

            // Verkrijgen van het ID van het nieuw aangemaakte contact
            $this->contact_id = $pdo->lastInsertId();

            echo "Contactgegevens zijn succesvol toegevoegd aan de database.";
        } catch(PDOException $e){
            die("Fout bij het toevoegen van contactgegevens: " . $e->getMessage());
        }
    }
}

// require 'dbconfig.php';

//     public function Create(){
//         $contact_id=$_POST[""];
//         $first_name=$_POST["voornaamvak"];
//         $last_name=$_POST["achternaamvak"];
//         $email=$_POST["emailvak"];
//         $phone=$_POST["telefoonvak"];

//         $contact = new Contact(null, 'john', 'Doe', 'john.doe@example.com', '123456789');
//         $contact->create($pdo); 
//     }
?>
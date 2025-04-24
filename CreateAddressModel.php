<?php
require_once '../Models/ClassContact_Address.php';
require_once '../Models/dbconnectie.php';
require_once '../Models/dbconfig.php';

class CreateAddress extends Address {
    private $street;
    private $city;
    private $postcode;
    private $country;
    private $contact_id;

    public function __construct($street, $city, $postcode, $country, $contact_id) {
        $this->street = $street;
        $this->city = $city;
        $this->postcode = $postcode;
        $this->country = $country;
        $this->contact_id = $contact_id;
    }

    public function create($pdo){
        try {
            // Query om Adresgegevens toe te voegen aan de database
            $sql = "INSERT INTO address (street, city, postcode, country, contact_id) VALUES (:street, :city, :postcode, :country, :contact_id)";
            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Binden van de parameters aan de query
            $stmt->bindParam(':street', $this->street, PDO::PARAM_STR);
            $stmt->bindParam(':city', $this->city, PDO::PARAM_STR);
            $stmt->bindParam(':postcode', $this->postcode, PDO::PARAM_STR);
            $stmt->bindParam(':country', $this->country, PDO::PARAM_STR);
            $stmt->bindParam(':contact_id', $this->contact_id, PDO::PARAM_STR);

            // Uitvoeren van de query
            $stmt->execute();

            echo "Adresgegevens zijn succesvol toegevoegd aan de database.";
        } catch(PDOException $e){
            die("Fout bij het toevoegen van adresgegevens: " . $e->getMessage());
        }
    }
}
?>
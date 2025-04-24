<?php
require_once '../Models/ClassContact_Address.php';
require_once '../Models/dbconnectie.php';

class UpdateAddress extends Database {
    private $addressID;
    private $street;
    private $city;
    private $postcode;
    private $country;

    public function __construct($address_id, $street, $city, $postcode, $country) {
        $this->addressID = $address_id;
        $this->street = $street;
        $this->city = $city;
        $this->postcode = $postcode;
        $this->country = $country;
    }

    public function addressUpdate($pdo, $newStreet, $newCity, $newPostcode, $newCountry) {
        $this->street = $newStreet;
        $this->city = $newCity;
        $this->postcode = $newPostcode;
        $this->country = $newCountry;

        try {
            // Query om adresgegevens bij te werken in de database
            $sql = "UPDATE address SET street = :street, city = :city, postcode = :postcode, country = :country WHERE address_id = :address_id";
            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Binden van de parameters aan de query
            $stmt->bindParam(':street', $this->street, PDO::PARAM_STR);
            $stmt->bindParam(':city', $this->city, PDO::PARAM_STR);
            $stmt->bindParam(':postcode', $this->postcode, PDO::PARAM_STR);
            $stmt->bindParam(':country', $this->country, PDO::PARAM_STR);
            $stmt->bindParam(':address_id', $this->addressID, PDO::PARAM_INT);

            // Uitvoeren van de query
            $stmt->execute();

            echo "Adresgegevens zijn succesvol bijgewerkt naar: " . $this->street . " " . $this->city . " " . $this->postcode . " " . $this->country . "\n";
        } catch(PDOException $e) {
            die("Fout bij het bijwerken van adresgegevens: " . $e->getMessage());
        }
    }
}
?>
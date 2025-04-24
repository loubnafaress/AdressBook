<?php
require_once '../Models/ReadAddressModel.php';

class Adress{
    public function addressController($straat, $stad, $postcode, $land){
        try {
            // Maak een nieuw Adress-object
            $address = new Address(null, null, null, null);

            // Roep de addressRead-methode aan om de gegevens in de database te plaatsen
            // $address->addressRead($straat, $stad, $postcode, $land);

            // Roep de addressReadTabel-methode aan om alle adressgegevens in een tabel weer te geven
            $address->addressReadTabel();
        } catch (PDOException $e) {
            die("Fout bij het lezen van adressgegevens: " . $e->getMessage());
        }
    }
}
?>
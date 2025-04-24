<?php
require_once '../Models/ReadContactModel.php';

class Contact{
    public function contactController($voornaam, $achternaam, $email, $telefoon){
        try {
            // Maak een nieuw Contact-object
            $contact = new Contact(null, null, null, null);

            // Roep de contactRead-methode aan om de gegevens in de database te plaatsen
            // $contact->contactRead($voornaam, $achternaam, $email, $telefoon);

            // Roep de contactReadTabel-methode aan om alle contactgegevens in een tabel weer te geven
            $contact->contactReadTabel();
        } catch (PDOException $e) {
            die("Fout bij het lezen van contactgegevens: " . $e->getMessage());
        }
    }
}
?>
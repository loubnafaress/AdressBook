<?php 
 class Contact {
    private $contact_id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $addresses = [];

    public function __construct($contact_id, $first_name, $last_name, $email, $phone){
        $this->contact_id = $contact_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getFullName(){
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function addAddresses(Addresses $addresses){
        $this->addresses[] = $addresses;
    }

    public function getAddresses(){
        return $this->addresses;
    }
 }

 class Address {
    private $address_id;
    private $street;
    private $city;
    private $postcode;
    private $country;
    private $contact_id;

    public function __construct($address_id, $street, $city, $postcode, $country, $contact_id){
        $this->address_id = $address_id;
        $this->street = $street;
        $this->city = $city;
        $this->postcode = $postcode;
        $this->country = $country;
        $this->contact_id = $contact_id;
    }

    public function getFullAddress(){
        return $this->street . ', ' . $this->city . ', ' . $this->postcode . ', ' . $this->county;
    }
 }
?>
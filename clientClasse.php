<?php

//définit, permet d'accéder aux colonnes d'un client (comme class Item)


class client{

    private int $id;
    private string $lastName;
    private string $firstName;
    private string $address;
    private int $cp;
    private string $city;

    public function __construct(array $customer)
    {
        $this->id = $customer['id'];
        $this->lastName = $customer['last_name'];
        $this->firstName = $customer['first_name'];
        $this->address = $customer['Address'];
        $this->cp = $customer['CP'];
        $this->city = $customer['City'];
    }

    public function getId() {
        return $this->id;
    }
    public function getLastName() {
        return $this->lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getCity() {
        return $this->city;
    }

}
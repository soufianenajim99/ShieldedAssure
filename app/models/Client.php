<?php

class Client {
private $ID_Client;
private $Nom;
private $Prenom;
private $Adresse;
private $username;
private $password;

public function __construct(){
}

public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
}

public function __set($property, $value) {
    if (property_exists($this, $property)) {
        $this->$property = $value;
    }

}


}
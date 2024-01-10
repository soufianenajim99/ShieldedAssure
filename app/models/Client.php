<?php

class Client {
private $ID_Client;
private $Nom;
private $Prenom;
private $Adresse;
private $username;
private $assurence;
private $password;

public function __construct($ID_Client, $Nom, $Prenom, $Adresse, $username, $password,$assurence) {
    $this->ID_Client = $ID_Client;
    $this->Nom = $Nom;
    $this->Prenom = $Prenom;
    $this->Adresse = $Adresse;
    $this->username = $username;
    $this->password = $password;
    $this->assurence = $assurence;
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
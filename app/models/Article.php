<?php

class Article {
private $ID_Article;
private $Titre;
private $Contenu;
private $Date;

private Assureur $ID_Assureur;

private Client $ID_Client;

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
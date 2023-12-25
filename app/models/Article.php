<?php

class Article {
private $ID_Article;
private $Titre;
private $Contenu;
private $Date;

private $ID_Assureur;

private $ID_Client;

public function __construct($ID_Article,$Titre,$Contenu,$Date,$ID_Assureur,$ID_Client){
    $this->ID_Article = $ID_Article;
    $this->Titre = $Titre;
    $this->Contenu = $Contenu;
    $this->Date = $Date;
    $this->ID_Assureur = $ID_Assureur;
    $this->ID_Client = $ID_Client;
    
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
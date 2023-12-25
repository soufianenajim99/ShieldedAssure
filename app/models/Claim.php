<?php

class Claim {
private $ID_Claim;
private $Description;
private $Date;
private $MontantPrim;
private $DatePrim;
private $ID_Article;

public function __construct($ID_Claim, $Description, $Date, $MontantPrim, $DatePrim, $ID_Article) {
    $this->ID_Claim = $ID_Claim;
    $this->Description = $Description;
    $this->Date = $Date;
    $this->MontantPrim = $MontantPrim;
    $this->DatePrim = $DatePrim;
    $this->ID_Article = $ID_Article;
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
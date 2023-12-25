<?php

class Claim {
private $ID_Claim;
private $Description;
private $Date;

private $MontantPrim;
private $DatePrim;
private Article $ID_Article;
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
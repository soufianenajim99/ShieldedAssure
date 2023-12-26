<?php

class Defcon extends Controller{

    public function __construct(){


    }
    public function index(){
      $this->view('homepage');
        // echo"hello";

    }
    public function login(){
      $this->view('loginPage',['title'=> 'LoginPageT']);
    }


}

?>
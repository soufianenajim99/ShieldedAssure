<?php

class admin extends Controller {

    public function __construct() {

    }
    public function home() {
     $this->view("admin/home");
    }}
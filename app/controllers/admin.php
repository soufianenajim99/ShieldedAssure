<?php

class admin extends Controller {

     private $AssureurService;

     public function __construct() {
        $db = new Database();
        $this->AssureurService = new AssureurService($db);
    }
    public function home() {
        
            $assureurs = $this->AssureurService->displayAssureur();
            // Data Transfer To view;
            $data = [
                'assurs' => $assureurs,
                'page' => 'shield'
            ];
            
            $this->view('admin/home' , $data );
        


     $this->view("admin/home");
    }}
<?php

class admin extends Controller {

     private $AssureurService;

    public function __construct() {

        $this->AssureurService = new AssureurService();
    }
    public function home() {
        
            $assureurs = $this->AssureurService->displayAssureur();
            // Data Transfer To view;
            $data = [
                'banks' => $assureurs,
                'page' => 'shield'
            ];
            
            $this->view('admin/bank' , $data );
        


     $this->view("admin/home");
    }}
<?php

class Assureur extends Controller {

     private $AssureurService;

    public function __construct() {

        $this->AssureurService = new AssureurService();
    }
    public function displayAssureur() {
        
            $assureurs = $this->AssureurService->displayAssureur();
            // Data Transfer To view;
            $data = [
                'assurs' => $assureurs,
                'page' => 'shield'
            ];
            
            $this->view('assureur/displayAssureur' , $data );
        
    }}
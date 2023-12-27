<?php

class Assureur extends Controller {
    
     private $AssureurService;

    public function __construct() {
        $db = new Database();
        $this->AssureurService = new AssureurService($db);
    }
    public function displayAssureur() {
        
            $assureurs = $this->AssureurService->displayAssureur();
            $data = [
                'assurs' => $assureurs,
                'page' => 'shield'
            ];
            $this->view('assureur/displayAssureur' , $data );
        
    }}
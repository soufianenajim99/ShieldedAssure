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
        
    }
   public function addassurence() {
    
    $db = new Database();
    $this->AssureurService = new AssureurService($db);
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        $Nom = $_POST["Nom"];
        $Adresse = $_POST["Adresse"];
                   $newAssureur = new Assureur();
                   $newAssureur->Nom = $Nom;
                   $newAssureur->Adresse = $Adresse;
                   try{
                    $this->AssureurService->addAssureur($newAssureur);
                    header("Location:".URLROOT."assureur/displayAssureur");
                   }
                   catch(PDOException $e){
                    die($e->getMessage());
                   }
                }
             
            }

    public function editAssurence() {
    $db = new Database();
    $this->AssureurService = new AssureurService($db);
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        $Nom = $_POST["Nom"];
        $Adresse = $_POST["Adresse"];
                   $newAssureur = new Assureur();
                   $newAssureur->Nom = $Nom;
                   $newAssureur->Adresse = $Adresse;
                   try{
                    $this->AssureurService->updateAssureur( $newAssureur );
                    header("Location:".URLROOT."assureur/displayAssureur");
                   }
                   catch(PDOException $e){
                    die($e->getMessage());
                   }
                }

    }
}
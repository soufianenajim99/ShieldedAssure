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

    // public function editAssurence($id) {
    // $db = new Database();
    // $this->AssureurService = new AssureurService($db);
    // if($_SERVER["REQUEST_METHOD"] == "POST" ){
    //     $Nom = $_POST["Nom"];
    //     $Adresse = $_POST["Adresse"];
    //                $newAssureur = new Assureur();
    //                $newAssureur->ID_Assureur= $id;
    //                $newAssureur->Nom = $Nom;
    //                $newAssureur->Adresse = $Adresse;
    //                try{
    //                 $this->AssureurService->updateAssureur( $newAssureur );
    //                 header("Location:".URLROOT."assureur/displayAssureur");
    //                }
    //                catch(PDOException $e){
    //                 die($e->getMessage());
    //                }
    //             }

    // }

    public function editAssurence($id) {
        $db = new Database();
        $this->AssureurService = new AssureurService($db);
        if($_SERVER["REQUEST_METHOD"] == "POST" ){
            $Nom = $_POST["Nom"];
            $Adresse = $_POST["Adresse"];
            $newAssureur = new Assureur();
            $newAssureur->Nom = $Nom;
            $newAssureur->Adresse = $Adresse;
            try{
               $this->AssureurService->updateAssureur( $newAssureur, $id );
               header("Location:".URLROOT."assureur/displayAssureur");
             }
             catch(PDOException $e){
                  die($e->getMessage());
             }
             }
        $assureurs = $this->AssureurService->displayAssureur();
            $data = [
                'id'=> $id,
                'assurs' => $assureurs,
                'page' => 'shield'
            ];
        $this->view("assureur/editAssurence", $data );
    }

    public function deleteAssureur($id) {
        $db = new Database();
        $this->AssureurService = new AssureurService($db);
        try{
            $this->AssureurService->deleteAssureur( $id );
            header("Location:".URLROOT."assureur/displayAssureur");
          }
          catch(PDOException $e){
               die($e->getMessage());
          }
    }
}
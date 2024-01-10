<?php

class Client extends Controller {
    
     private $ClientService;
     private $AssureurService;


    public function __construct() {
        $db = new Database();
        $this->ClientService = new ClientService($db);
        $this->AssureurService = new AssureurService($db);
    }
    public function displayClient() {

            $assureurs = $this->AssureurService->displayAssureur();
            $Clients = $this->ClientService->displayClient();
            $data = [
                'assure' => $assureurs,
                'clients' => $Clients,
                'page' => 'shield'
            ];
            $this->view('Client/displayClient' , $data );
        
    }
   public function addClient() {
    
    $db = new Database();
    $this->ClientService = new ClientService($db);
    if($_SERVER["REQUEST_METHOD"] === "POST" ){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        $newClient = new Client();
                   $newClient->Nom = $_POST["Nom"];;
                   $newClient->Prenom = $_POST["Prenom"];
                   $newClient->Adresse = $_POST["Adresse"];
                   $newClient->username = $_POST["username"];
                   $newClient->password = $_POST["Password"];
                   $newClient->assurence = $_POST["assurence"];
                   try{
                    $this->ClientService->addClient($newClient);
                    header("Location:".URLROOT."Client/displayClient");
                   }
                   catch(PDOException $e){
                    die($e->getMessage());
                   }
                }
             
            }

    public function editClient($id) {
    $db = new Database();
    $this->ClientService = new ClientService($db);
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        // echo "test";
                   $newClient = new Client();
                   $newClient->Nom = $_POST["Nom"];
                   $newClient->Prenom = $_POST["Prenom"];
                   $newClient->Adresse = $_POST["Adresse"];
                   $newClient->username = $_POST["username"];
                   $newClient->password = $_POST["Password"];
                   $newClient->assurence = $_POST["assurence"];
                   try{
                    $this->ClientService->updateClient( $newClient , $id );
                    header("Location:".URLROOT."Client/displayClient");
                   }
                   catch(PDOException $e){
                    die($e->getMessage());
                   }
                }

                $assureurs = $this->AssureurService->displayAssureur();
                $Clients = $this->ClientService->displayClient();

                $data = [
                    'id'=> $id,
                    'clients'=> $Clients,
                    'assurs' => $assureurs,
                    'page' => 'shield'
                ];
            $this->view("Client/editClient", $data );

    }

    // public function editAssurence($id) {
    //     $db = new Database();
    //     $this->ClientService = new ClientService($db);
    //     if($_SERVER["REQUEST_METHOD"] == "POST" ){
    //         $Nom = $_POST["Nom"];
    //         $Adresse = $_POST["Adresse"];
    //         $newClient = new Client();
    //         $newClient->Nom = $Nom;
    //         $newClient->Adresse = $Adresse;
    //         try{
    //            $this->ClientService->updateClient( $newClient, $id );
    //            header("Location:".URLROOT."Client/displayClient");
    //          }
    //          catch(PDOException $e){
    //               die($e->getMessage());
    //          }
    //          }
    //     $Clients = $this->ClientService->displayClient();
    //         $data = [
    //             'id'=> $id,
    //             'assurs' => $Clients,
    //             'page' => 'shield'
    //         ];
    //     $this->view("Client/editAssurence", $data );
    // }

    public function deleteClient($id) {
        $db = new Database();
        $this->ClientService = new ClientService($db);
        try{
            $this->ClientService->deleteClient( $id );
            header("Location:".URLROOT."Client/displayClient");
          }
          catch(PDOException $e){
               die($e->getMessage());
          }
    }
}
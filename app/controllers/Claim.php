<?php

class Claim extends Controller {

    private $ClientService;
    private $AssureurService;
    private $ArticleService;
    private $ClaimService;


    public function __construct(){
        $db = new Database();
        $this->ClientService = new ClientService($db);
        $this->ClaimService = new ClaimService($db);
        $this->ArticleService = new ArticleService($db);
        $this->AssureurService = new AssureurService($db);
    }

    public function displayClaim(){
        $articles=$this->ArticleService->displayArticle();
        $claim= $this->ClaimService->displayClaim();
        $assureurs = $this->AssureurService->displayAssureur();
        $Clients = $this->ClientService->displayClient();
        $data = [
            'claims' => $claim,
            'article' => $articles,
            'page' => 'shield'
        ];
        $this->view("claim/displayClaim", $data);
    }

    public function addClaim(){
        if($_SERVER["REQUEST_METHOD"] === "POST" ){
            $newClaim = new Claim();
                       $newClaim->Description = $_POST["descr"];;
                       $newClaim->Date = $_POST["date"];
                       $newClaim->MontantPrim = $_POST["montprim"];
                       $newClaim->DatePrim = $_POST["dateprim"];
                       $newClaim->ID_Article = $_POST["article"];
                       try{
                        $this->ClaimService->addClaim($newClaim);
                        header("Location:".URLROOT."Claim/displayClaim");
                       }
                       catch(PDOException $e){
                        die($e->getMessage());
                       }
                    }
       
    }


    public function deleteClaim($id) {
        $db = new Database();
        $this->ClaimService = new ClaimService($db);
        try{
            $this->ClaimService->deleteClaim( $id );
            header("Location:".URLROOT."Claim/displayClaim");
          }
          catch(PDOException $e){
               die($e->getMessage());
          }
    }





    public function editClaim($id) {
        $db = new Database();
        $this->ClaimService = new ClaimService($db);
        if($_SERVER["REQUEST_METHOD"] == "POST" ){
            // echo "test";
            $newClaim = new Claim();
            $newClaim->Description = $_POST["descr"];;
                       $newClaim->Date = $_POST["date"];
                       $newClaim->MontantPrim = $_POST["montprim"];
                       $newClaim->DatePrim = $_POST["dateprim"];
                       $newClaim->ID_Article = $_POST["article"];
                       try{
                        $this->ClaimService->updateClaim( $newClaim , $id );
                        header("Location:".URLROOT."Claim/displayClaim");
                       }
                       catch(PDOException $e){
                        die($e->getMessage());
                       }
                    }
    
        $articles=$this->ArticleService->displayArticle();
        $claim= $this->ClaimService->displayClaim();
    
        $data = [
            'claims' => $claim,
            'article' => $articles,
            'page' => 'shield'
        ];
                $this->view("Claim/editClaim", $data );
    
        }





}
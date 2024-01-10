<?php

class Article extends Controller {

    private $ArticleService;
    private $ClientService;
    private $AssureurService;

    public function __construct(){
        $db = new Database();
        $this->ArticleService = new ArticleService($db);
        $this->ClientService = new ClientService($db);
        $this->AssureurService = new AssureurService($db);
    }

    public function displayArticle(){
        $articles=$this->ArticleService->displayArticle();
        $assureurs = $this->AssureurService->displayAssureur();
        $Clients = $this->ClientService->displayClient();
        $data=[
            "articles"=>$articles,
            "assureurs"=>$assureurs,
            "clients"=>$Clients
        ];
        $this->view("article/displayArticle",$data);
    }

    public function addArticle(){
        if($_SERVER["REQUEST_METHOD"] === "POST" ){
            $newArticle = new Article();
                       $newArticle->Titre = $_POST["Nom"];;
                       $newArticle->Contenu = $_POST["Contenu"];
                       $newArticle->Date = $_POST["Date"];
                       $newArticle->ID_Assureur = $_POST["assurence"];
                       $newArticle->ID_Client = $_POST["client"];
                       try{
                        $this->ArticleService->addArticle($newArticle);
                        header("Location:".URLROOT."Article/displayArticle");
                       }
                       catch(PDOException $e){
                        die($e->getMessage());
                       }
                    }
       
    }


    public function deleteArticle($id) {
        $db = new Database();
        $this->ArticleService = new ArticleService($db);
        try{
            $this->ArticleService->deleteArticle( $id );
            header("Location:".URLROOT."Article/displayArticle");
          }
          catch(PDOException $e){
               die($e->getMessage());
          }
    }





    public function editArticle($id) {
        $db = new Database();
        $this->ArticleService = new ArticleService($db);
        if($_SERVER["REQUEST_METHOD"] == "POST" ){
            // echo "test";
            $newArticle = new Article();
            $newArticle->Titre = $_POST["Nom"];;
            $newArticle->Contenu = $_POST["Contenu"];
            $newArticle->Date = $_POST["Date"];
            $newArticle->ID_Assureur = $_POST["assurence"];
            $newArticle->ID_Client = $_POST["client"];
                       try{
                        $this->ArticleService->updateArticle( $newArticle , $id );
                        header("Location:".URLROOT."Article/displayArticle");
                       }
                       catch(PDOException $e){
                        die($e->getMessage());
                       }
                    }
    
        $Articles=$this->ArticleService->displayArticle();
        $assureurs = $this->AssureurService->displayAssureur();
        $Clients = $this->ClientService->displayClient();
    
                    $data = [
                        "articles"=>$Articles,
            "assureurs"=>$assureurs,
            "clients"=>$Clients
                    ];
                $this->view("Article/editArticle", $data );
    
        }





}
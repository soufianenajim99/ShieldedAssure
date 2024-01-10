<?php



class ArticleService extends Database implements ImArticleService {
    private $db;
    public function __construct(Database $db) {
    $this->db = $db;
    }
    function displayArticle(){
    $db = $this->connectDatabase();
    $query=$db->query('SELECT * FROM article');
    $data_assureur=$query->fetchAll(PDO::FETCH_OBJ);
    return $data_assureur;
    }
    function addArticle(Article $article){
        $db = $this->connectDatabase();
        $sql='INSERT INTO article (`Titre`, `Contenu`, `Date`, `ID_Assureur`, `ID_Client`) VALUES(:Titre, :Contenu, :Date, :ID_Assureur, :ID_Client)';
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":Titre"=>$article->Titre,
                ":Contenu"=>$article->Contenu,
                ":Date"=>$article->Date,
                ":ID_Assureur"=>$article->ID_Assureur,
                ":ID_Client"=>$article->ID_Client
               ]);
           }
           catch(PDOException $e){
              die($e->getMessage());
           }
       
        $db=null;
        $stmt=null;
    }
    function updateArticle(Article $article, $id){
        $db = $this->connectDatabase();
        $sql='UPDATE article SET `Titre`= :Titre,`Contenu`= :Contenu ,`Date`=:Date,`ID_Assureur`= :ID_Assureur,`ID_Client`= :ID_Client WHERE ID_Article = :ID_Article';
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":Titre"=>$article->Titre,
                ":Contenu"=>$article->Contenu,
                ":Date"=>$article->Date,
                ":ID_Assureur"=>$article->ID_Assureur,
                ":ID_Client"=>$article->ID_Client,
                ":ID_Article" => $id,
               ]);
           }
           catch(PDOException $e){
              die($e->getMessage());
           }
       
        $db=null;
        $stmt=null;

        
    }
    function deleteArticle($articleId){
        $db = $this->connectDatabase();
        $sql= "DELETE FROM article WHERE ID_Article = :ID_Article";
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":ID_Article"=> $articleId,
            ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }


    
}
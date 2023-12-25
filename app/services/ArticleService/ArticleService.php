<?php



class ArticleService implements ImArticleService {

    public function addArticle(Article $article) {
     $db=$this->connect();
     if ($db == null) {
        return null;
    }
    $articleId = $article->ArticleId;
    $balance = $Article->balance;
    $RIB = $Article->RIB;
    $userId = $Article->userId;

    $sql = "INSERT INTO Article (ArticleId ,balance , RIB , userID)
    VALUES (:ArticleId ,:balance , :rib , :userID)
    ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':ArticleId' ,$ArticleId,PDO::PARAM_STR);
    $stmt->bindParam(':balance' ,$balance,PDO::PARAM_STR);
    $stmt->bindParam(':rib' ,$RIB,PDO::PARAM_STR);
    $stmt->bindParam(':userID' ,$userId,PDO::PARAM_STR);

   try{
     $stmt->execute();
    }
    catch(PDOException $e){
   die("invalid query" . $e->getMessage());
   }

   $db = null;
   $stmt = null;

    }

    public function displayArticle(){
        $db_connection = $this->connect();
            if ($db_connection == null) {
                return null;
            }
            $sql = "SELECT * FROM Article";

            $stmt = $db_connection->query($sql);

            $Articles = $stmt->fetchAll(PDO::FETCH_OBJ);
            
            $db_connection = null;
            $stmt = null;

            return $Articles;


    }

    public function updateArticle(Article $Article) {
        $db_connection = $this->connect();
        if ($db_connection == null) {
            return null;
        }
        
        $ArticleId = $Article->ArticleId;
        $balance = $Article->balance;
        $RIB = $Article->RIB;
        $userId = $Article->userId;

        $sql = "UPDATE Article SET balance = :balance , RIB = :rib WHERE ArticleId = :ArticleID";

        $stmt = $db_connection->prepare($sql);


        $stmt->execute([
            ":balance"=> $balance,
            ":rib"=> $RIB,
            ":ArticleId"=> $ArticleId,

        ]);

        $db_connection = null;
        $stmt = null;

    }

    public function deleteArticle($ArticleID) {

        $db_connection = $this->connect();

        if ($db_connection == null) {
            return null;
        }

        $sql = "DELETE FROM Article WHERE ArticleId = :ArticleID";

        $stmt = $db_connection->prepare($sql);

        $stmt->execute([
            ":ArticleID"=> $ArticleID,
        ]);

        $db_connection = null;
        $stmt = null;

    }












    


    

}






?>
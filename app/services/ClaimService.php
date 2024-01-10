<?php



class ClaimService extends Database implements ImClaimService {
    private $db;
    public function __construct(Database $db) {
    $this->db = $db;
    }
    function displayClaim(){
    $db = $this->connectDatabase();
    $query=$db->query('SELECT claim.* ,
    article.Titre FROM claim 
    JOIN article ON article.ID_Article = claim.ID_Article;');
    $data_assureur=$query->fetchAll(PDO::FETCH_OBJ);
    return $data_assureur;
    }
    function addClaim(Claim $claim){
        $db = $this->connectDatabase();
        $sql='INSERT INTO claim (`Description`, `Date`, `MontantPrim`, `DatePrim`, `ID_Article`) VALUES(:Description, :Date, :MontantPrim, :DatePrim, :ID_Article)';
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":Description"=>$claim->Description,
                ":Date"=>$claim->Date,
                ":MontantPrim"=>$claim->MontantPrim,
                ":DatePrim"=>$claim->DatePrim,
                ":ID_Article"=>$claim->ID_Article
               ]);
           }
           catch(PDOException $e){
              die($e->getMessage());
           }
       
        $db=null;
        $stmt=null;
    }
    function updateClaim(Claim $claim, $id){
        $db = $this->connectDatabase();
        $sql='UPDATE claim SET `Description`= :Description,`Date`= :Date ,`MontantPrim`=:MontantPrim,`DatePrim`= :DatePrim,`ID_Article`= :ID_Article WHERE ID_Claim = :ID_Claim';
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":Description"=>$claim->Description,
                ":Date"=>$claim->Date,
                ":MontantPrim"=>$claim->MontantPrim,
                ":DatePrim"=>$claim->DatePrim,
                ":ID_Article"=>$claim->ID_Article,
                ":ID_Claim" => $id,
               ]);
           }
           catch(PDOException $e){
              die($e->getMessage());
           }
       
        $db=null;
        $stmt=null;

        
    }
    function deleteClaim($claimId){
        $db = $this->connectDatabase();
        $sql= "DELETE FROM claim WHERE ID_Claim = :ID_Claim";
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":ID_Claim"=> $claimId,
            ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }


    
}
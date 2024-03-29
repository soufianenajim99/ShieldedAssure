<?php



class AssureurService extends Database implements ImAssureurService {
    private $db;
    public function __construct(Database $db) {
    $this->db = $db;
    }
    function displayAssureur(){
    $db = $this->connectDatabase();
    $query=$db->query('SELECT * FROM assureur');
    $data_assureur=$query->fetchAll(PDO::FETCH_OBJ);
    return $data_assureur;
    }
    function addAssureur(Assureur $assureur){
        $db = $this->connectDatabase();
        $sql='INSERT INTO assureur (Nom,Adresse) VALUES(:Nom, :Adresse)';
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":Nom" => $assureur->Nom,
                ":Adresse" => $assureur->Adresse,
               ]);
           }
           catch(PDOException $e){
              die($e->getMessage());
           }
       
        $db=null;
        $stmt=null;
    }
    function updateAssureur(Assureur $assureur, $id){
        $db = $this->connectDatabase();
        $sql='UPDATE assureur SET Nom = :Nom, Adresse = :Adresse WHERE ID_Assureur = :ID_Assureur';
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":Nom" => $assureur->Nom,
                ":Adresse" => $assureur->Adresse,
                ":ID_Assureur" => $id,
               ]);
           }
           catch(PDOException $e){
              die($e->getMessage());
           }
       
        $db=null;
        $stmt=null;

        
    }
    function deleteAssureur($assureurId){
        $db = $this->connectDatabase();
        $sql= "DELETE FROM assureur WHERE ID_Assureur = :ID_Assureur";
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":ID_Assureur"=> $assureurId,
            ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }


    
}
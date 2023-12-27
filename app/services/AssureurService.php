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
        $sql='INSERT INTO bank (Nom,Adresse) VALUES(:Nom, :Adresse)';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ":Nom" => $assureur->Nom,
            ":Adresse" => $assureur->Adresse,
           ]);
        $db=null;
        $stmt=null;
    }
    function updateAssureur(Assureur $assureur){
        $db = $this->connectDatabase();
        
    }
    function deleteAssureur($assureurId){
        $db = $this->connectDatabase();

        
    }


    
}
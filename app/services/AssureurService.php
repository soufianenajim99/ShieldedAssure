<?php



class AssureurService implements ImAssureurService {

    private $db ;

    public function __construct(){
        $this->db = new Database();
    }
    function displayAssureur(){
    $db = new PDO(CONFIG['db'],CONFIG['db_user'],CONFIG['db_password']);
    $query=$db->query('SELECT * FROM assureur');
    $data_assureur=$query->fetchAll(PDO::FETCH_OBJ);
    return $data_assureur;
    }
    function addAssureur(Assureur $assureur){

        
    }
    function updateAssureur(Assureur $assureur){
        
    }
    function deleteAssureur($assureurId){
        
    }


    
}
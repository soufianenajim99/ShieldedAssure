<?php



class ClientService extends Database implements ImClientService {
    private $db;
    public function __construct(Database $db) {
    $this->db = $db;
    }
    function displayClient(){
    $db = $this->connectDatabase();
    $query=$db->query('SELECT client.* ,assureur.Nom AS NomAssureur FROM client JOIN assureurclients ON assureurclients.ID_Client = client.ID_Client JOIN assureur ON assureur.ID_Assureur = assureurclients.ID_Assureur;');
    $data_client=$query->fetchAll(PDO::FETCH_OBJ);
    return $data_client;
    }
    function addClient(Client $client){
        $db = $this->connectDatabase();
        $sql='START TRANSACTION;
     
             INSERT INTO client (Nom, Prenom, Adresse,username,password)
              VALUES (:Nom,:Prenom,:Adresse,:username,:password);
     
        
              SET @userId = LAST_INSERT_ID();
        
             INSERT INTO assureurclients (ID_Assureur, ID_Client)
             VALUES (:assureur, @userId);
     
        
             COMMIT;';
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":Nom" => $client->Nom,
                ":Prenom" => $client->Prenom,
                ":Adresse" => $client->Adresse,
                ":username" => $client->username,
                ":password" => $client->password,
                ":assureur" => $client->assurence,
               ]);
           }
           catch(PDOException $e){
              die($e->getMessage());
           }
       
        $db=null;
        $stmt=null;
    }
    function updateClient(Client $client, $id){
        $db = $this->connectDatabase();
        $sql='UPDATE client SET Nom = :Nom, Prenom = :Prenom, Adresse = :Adresse , password = :password  WHERE ID_Client = :ID_Client;
        UPDATE assureurclients SET ID_Assureur = :ID_Assureur WHERE ID_Client = :ID_Client ;';
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":Nom" => $client->Nom,
                ":Prenom" => $client->Prenom,
                ":Adresse" => $client->Adresse,
                ":password" => $client->password,
                ":ID_Assureur" => $client->assurence,
                ":ID_Client" => $id,
               ]);
           }
           catch(PDOException $e){
              die($e->getMessage());
           }
       
        $db=null;
        $stmt=null;        
    }
    function deleteClient($clientId){
        $db = $this->connectDatabase();
        $sql= "DELETE FROM client WHERE ID_Client = :ID_Client";
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([
                ":ID_Client"=> $clientId,
            ]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }


    
}
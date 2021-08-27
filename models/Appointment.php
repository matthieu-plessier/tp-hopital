<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/db.php');
    class Appointment {

        private $_id;
        private $_dateHour;
        private $_idPatients;
        private $db;
        
/////////////////////////////////////////////////AJOUT RDV///////////////////////////////////////////////////////////////////////////////////////
    // méthode magique pour "hydrater"
    public function __construct($dateHour = "", $idPatients = "")

    {
    $this->_dateHour=$dateHour;
    $this->_idPatients=$idPatients;
    $this->db = Database::getInstance();
    }



    public function addAppointment(){

        $sql = "INSERT INTO `appointments`
                (`dateHour`, `idPatients`)
                VALUES
                (:dateHour, :idPatients)";

        $db = Database::getInstance();
        $req = $this->db->prepare($sql);

        $req->bindValue(':dateHour', $this->_dateHour, PDO::PARAM_STR);
        $req->bindValue(':idPatients', $this->_idPatients, PDO::PARAM_STR);


        try {
            $req->execute();
            return 12; // RDV validé 
        } catch (PDOException $ex) {
            return 404; // Une erreur est survenue
        }

    }
///////////////////////////////////////////////////LISTE DES RDV////////////////////////////////////////////////////////////////////////////////

public static function findAllAppointment(){
    // requête sql
    $sql = "SELECT * FROM `appointments`";
    // demander à PDO d'exécuter la requête passée en paramètre appel la methode query
    
    
    // récupérer les données dans un tableau PHP
    try {
        $sth =  Database::getInstance()->query($sql);
        if ($sth == true){
            $result = $sth->fetchAll();
            return $result;
        }
        
    } catch (PDOException $ex) {
        return $ex;
    }
    
    
}
    
    
}
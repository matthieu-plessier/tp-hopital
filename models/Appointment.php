<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/db.php');
    class Appointment {

        private $_id;
        private $_dateHour;
        private $_idPatients;
        private $db;
        
    
    // méthode magique pour "hydrater"
    public function __construct($id = "", $dateHour = "", $idPatients = "",)

    {
    $this->_id=$id; 
    $this->_dateHour=$dateHour;
    $this->_idPatients=$idPatients;
    $this->db = Database::getInstance();
    }
    public function addRendezVous($id){

        $sql = "INSERT INTO `appointments`
                (`dateHour`, `idPatients`)
                VALUES
                (:dateHour, :idPatients)";

        $req = $this->db->prepare($sql);

        $req->bindValue(':id', $this->_id, PDO::PARAM_STR);
        $req->bindValue(':dateHour', $this->_dateHour, PDO::PARAM_STR);
        $req->bindValue(':idPatients', $this->_idPatients, PDO::PARAM_STR);

    }
}
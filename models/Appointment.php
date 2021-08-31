<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/db.php');
    class Appointment {

        private $_id;
        private $_dateHour;
        private $_idPatients;
        private $db;
        
///////////////////////////////////////////////// AJOUT RDV///////////////////////////////////////////////////////////////////////////////////////
    
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
/////////////////////////////////////////////////// LISTE DES RDV ////////////////////////////////////////////////////////////////////////////////

public static function findAllAppointment(){
    // requête sql
    // Eviter * cibler les infos necessaires
    $sql = "SELECT `appointments`.`id`, `patients`. `lastname`, `patients`. `firstname`,  `patients`. `phone`, `appointments`. `idPatients`, `appointments`. `dateHour`
            FROM `patients`
            INNER JOIN `appointments` 
            ON `patients`.id = `appointments`.idPatients";
    
    // demander à PDO d'exécuter la requête passée en paramètre appel la methode query
    
    
    // récupérer les données dans un tableau PHP
    try {
        $sth = Database::getInstance()->query($sql);
        if ($sth == true){
            $result = $sth->fetchAll();
            return $result;
        }
        
    } catch (PDOException $ex) {
        return $ex;
    }
    
    
}
///////////////////////////////////////////////////// LISTE & MODIF DES RDV /////////////////////////////////////////////////////////////////////////////////////////////
    
public function checkAppointment($id){

    $sql = "SELECT `appointments`.`id`, `patients`. `lastname`, `patients`. `firstname`,  `patients`. `phone`, `appointments`. `idPatients`, `appointments`. `dateHour`
    FROM `patients`
    INNER JOIN `appointments` 
    ON `patients`.id = `appointments`.idPatients
    WHERE `appointments`.`id`= :id;"
    ;
    $sth = Database::getInstance()->prepare($sql);
    $sth->BindValue(':id', $id);
    try {
        
        if ($sth->execute()){
            $result = $sth->fetch();
            return $result;
        }
        
    } catch (PDOException $ex) {
        return $ex;
    }


}

public function update($id)
{
    $sql ="UPDATE  `appointments` 
            SET `dateHour`= :dateHour
            WHERE `id` = :id;";

            $req = $this->db->prepare($sql);

            $req->bindValue(':dateHour', $this->_dateHour, PDO::PARAM_STR);
            $req->bindValue(':id', $id, PDO::PARAM_STR);


    try {
        if ($req->execute())
        // retourne les données récup
        return 3;
    } catch (PDOException $ex) {
        return false;
    }
}
///////////////////////////////////////////////////////// LISTE DES RDV PAR PATIENTS //////////////////////////////////////////////////////////////////////////////

public function userAppointments($id){

    $sql ="SELECT `appointments`.`id`, `appointments`. `idPatients`, `appointments`. `dateHour`
    FROM `patients`
    INNER JOIN `appointments` 
    ON `patients`.id = `appointments`.idPatients
    WHERE `appointments`.`idPatients`= :id;";

    $req = $this->db->prepare($sql);

    $req->bindValue(':id', $id, PDO::PARAM_STR);

    try {
        
        if ($req->execute()){
            $result = $req->fetchAll();
            return $result;
        }
        
    } catch (PDOException $ex) {
        return $ex;
    }
}
//////////////////////////////////////////////////////////// SUPPRESSION DE RDV //////////////////////////////////////////////////////////////////////////////

public function deleteApointment(){

    $sql ="DELETE INTO `appointments`
            (`dateHour`, `idPatients`)
            VALUES
            (:dateHour, :idPatients)";

    $db = Database::getInstance();
    $req = $this->db->prepare($sql);

    $req->bindValue(':dateHour', $this->_dateHour, PDO::PARAM_STR);
    $req->bindValue(':idPatients', $this->_idPatients, PDO::PARAM_STR);


    try {
        $req->execute();
        return 12; // RDV annulé
    } catch (PDOException $ex) {
        return 404; // Une erreur est survenue
    }
    }
}
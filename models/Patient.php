<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/db.php');

    class Patient {
        
        private $_id;
        private $_lastname;
        private $_firstname;
        private $_birthdate;
        private $_phone;
        private $_email;
        private $db;

        // méthode magique pour "hydrater"

        public function __construct($lastname = "", $firstname = "", $birthdate = "", $phone = "", $email = "")

        {
        $this->_lastname=$lastname; 
        $this->_firstname=$firstname;
        $this->_birthdate=$birthdate;
        $this->_phone=$phone;
        $this->_email=$email;
        $this->db = Database::getInstance();
        }
        // verifie que le mail existe 
        public static function checkDuplicate($mail){
            $checkMailSql ="SELECT `mail`
                            FROM `patients` 
                            WHERE `mail`= :mail;";
            

            $stmtCheckMailReq = Database::getInstance()->prepare($checkMailSql);
            
            $stmtCheckMailReq->bindValue(':mail',$mail,PDO::PARAM_STR);
            try {
                $stmtCheckMailReq->execute();
                return $stmtCheckMailReq->fetchColumn();
            } catch (PDOException $ex) {
                return false;
            }
        }
///////////////////////////////////////////////// AJOUT PATIENT ///////////////////////////////////////////////////////////////////////////////////////
        public function addPatient()
        {
            if($this->checkDuplicate($this->_email) == false){

                $sql ="INSERT INTO `patients`
                        (`lastname`, `firstname`, `birthdate`, `phone`, `mail`)
                        VALUES
                        (:lastname, :firstname, :birthdate, :phone, :email)";

                $req = $this->db->prepare($sql);

                $req->bindValue(':lastname', $this->_lastname, PDO::PARAM_STR);
                $req->bindValue(':firstname', $this->_firstname, PDO::PARAM_STR);
                $req->bindValue(':birthdate', $this->_birthdate, PDO::PARAM_STR);
                $req->bindValue(':phone', $this->_phone, PDO::PARAM_STR);
                $req->bindValue(':email', $this->_email, PDO::PARAM_STR);

                try {
                    $req->execute();
                    return 5;// Validé, patient enregistré
                }catch (PDOException $ex){
                    return 404; // Une erreur est survenue
                }
                }else {
                    return 2; //Le patient existe déjà
                }
        }
//////////////////////////////////////////////////////// LISTE PATIENT ///////////////////////////////////////////////////////////////////////////////////////        
        public static function findAll(){
            // requête sql
            $sql = "SELECT * FROM `patients`";
            
            
            
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
////////////////////////////////////////////////////// PROFIL PATIENT ///////////////////////////////////////////

    public static function checkPatient($id)
    {
        $sql = "SELECT * FROM `patients` WHERE `id` = :id;";
        $req =  Database::getInstance()->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    
        try {
            
            if($req) {
                // on return les données récupérées
                
                return $req->fetch(PDO::FETCH_OBJ);//existe
            }
        } catch (PDOException $ex) {
            return 10; // erreur
        }

    }
////////////////////////////////////////////////////// MISE A JOUR PATIENT//////////////////////////////////////////////////////////////////////////
    public function upDate($id)
    {
        $sql ="UPDATE  `patients` 
                SET `lastname`= :lastname, `firstname`= :firstname, `birthdate`= :birthdate, `phone`= :phone, `mail`= :email
                WHERE `id` = :id;";

                $req = $this->db->prepare($sql);

                $req->bindValue(':lastname', $this->_lastname, PDO::PARAM_STR);
                $req->bindValue(':firstname', $this->_firstname, PDO::PARAM_STR);
                $req->bindValue(':birthdate', $this->_birthdate, PDO::PARAM_STR);
                $req->bindValue(':phone', $this->_phone, PDO::PARAM_STR);
                $req->bindValue(':email', $this->_email, PDO::PARAM_STR);
                $req->bindValue(':id', $id, PDO::PARAM_STR);


        try {
            if ($req->execute())
            // retourne les données récup
            return 3;
        } catch (PDOException $ex) {
            return false;
        }
    }
////////////////////////////////////////////////////// DELETE PATIENT & RDV //////////////////////////////////////////////////////////////////////////////////////////

    public function deletePandA($id)
    {
        $sql =" DELETE FROM `patients` 
                WHERE `id`= :id;";

                $req = $this->db->prepare($sql);

                $req->bindValue(':id', $id, PDO::PARAM_STR);

                try {
                    if ($req->execute())
                    // retourne les données récup
                    return 15;
                } catch (PDOException $ex) {
                    return false;
                }
    }
/////////////////////////////////////////////////////////// SEARCH PATIENT ///////////////////////////////////////////////////////////////

    public function searchPatient(){

        $sql =" SELECT * FROM `patients`
                WHERE `lastname` LIKE  CONCAT('%', :lastname, '%')";
                

                $req = $this->db->prepare($sql);

                $req->bindValue(':lastname', $this->_lastname, PDO::PARAM_STR);
                

                try {
                    if ($req->execute())
                    // retourne les données récup
                    return $req->fetchAll() ;
                } catch (PDOException $ex) {
                    return 16;
                }
    }

    ///////////////////////////////////////////////////////// PAGINATION ///////////////////////////////////////////////////////

    public function pagination(){

    $sql = "SELECT COUNT(*) AS nbr_patients FROM `patients`;";

    // On prépare la requête
    $req = $this->db->prepare($sql);

    // On exécute
    $req->execute();

    // On récupère le nombre d'articles
    $result = $req->fetch();

    $nbArticles = (int) $result['nb_articles'];

    // On détermine le nombre d'articles par page
    $parPage = 5;

    // On calcule le nombre de pages total
    $pages = ceil($nbArticles / $parPage);
    
    
    //Mise en place de la pagination
    //Maintenant que nous connaissons toutes les informations, 
    //nous allons pouvoir définir quels articles nous devons afficher en fonction de la page chargée.

    $sql = "SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT 0, 5;";



    }
    
}
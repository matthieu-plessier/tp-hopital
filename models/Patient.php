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
        public static function findAll(){
            // requête sql
            $sql = "SELECT * FROM `patients`";
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
             // méthode pour voir le profil d'un patient
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function update($id)
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
            // retourne les donnéées récup
            return 3;
        } catch (PDOException $ex) {
            return false;
        }
    }
    }
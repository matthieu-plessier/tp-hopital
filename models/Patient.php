<?php
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
        $this->db = db_connect();
        }
        // verifie que le mail existe 
        public static function checkDuplicate($mail){
            $checkMailSql ="SELECT `mail`
                            FROM `patients` 
                            WHERE `mail`= :mail ";
            $db = db_connect();

            $stmtCheckMailReq = $db->prepare($checkMailSql);
            
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
                    return $req->execute(); // Validé, patient enregistré
                }catch (PDOException $ex){
                    return $ex ; // Une erreur est survenue
                }
                }else {
                    return 2; //Le patient existe déjà
                }
        }
        public static function findAll(){
            // requête sql
            $sql = "SELECT * FROM `patients`";
            // demander à PDO d'exécuter la requête passée en paramètre appel la methode query
            $db = db_connect();
            
            // récupérer les données dans un tableau PHP
            try {
                $sth = $db->query($sql);
                if ($sth == true){
                    $result = $sth->fetchAll();
                    return $result;
                }
                
            } catch (PDOException $ex) {
                return $ex;
            }
            
            
        }

        
    }

                






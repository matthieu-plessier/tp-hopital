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

        // méthode magique pour "hydraté"

        public function __construct($lastname = "", $firstname = "", $birthdate = "", $phone = "", $email = "")

        {
        $this->_lastname=$lastname; 
        $this->_firstname=$firstname;
        $this->_birthdate=$birthdate;
        $this->_phone=$phone;
        $this->_email=$email;
        $this->db = db_connect();
        }
        public function addPatient()
        {
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
                return $req->execute();
            }catch (PDOException $ex){
                return $ex ;
            }
        }
        public function findAll(){
            // requête sql
            $sql = "SELECT * FROM `patients`";
            // demander à PDO d'exécuter la requête passée en paramètre appel la methode query
            $req = $this->db->query($sql);
            
            // récupérer les données dans un tableau PHP
            $result = $req->fetchAll();
            return $result;
            
        }

        
    }

                






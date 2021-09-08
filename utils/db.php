<?php

// SINGLETON
class Database{

    private static $_pdo;

    public static function getInstance()
    {
        try {
            if(is_null(self::$_pdo)){
                self::$_pdo = new PDO(DSN,LOGIN, PASSWORD);
                self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//defini la méthode de retour fetch

            }
            return self::$_pdo;
        } catch (PDOException $ex) {
            echo sprintf('Probleme de connexion avec l\'erreur', $ex->getMessage());

        }
    }
    
}


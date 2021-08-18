<?php

function db_connect()
{
    $dsn = 'mysql:host=localhost;dbname=hopital;charset=utf8';
    $user = 'root';
    $password = '';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    try {
        $pdo = new PDO($dsn, $user, $password, $options);
        return $pdo;
    } catch(PDOException $ex) {
        die('erreur de connexion à la bdd');
    }
}
<?php
$messageCode = [
    2 => ['type' => 'alert-danger', 'msg' => 'Le patient existe déjà'],
    3 => ['type' => 'alert-success', 'msg' => 'Modifications validées !'],
    5 => ['type' => 'alert-success', 'msg' => 'L\'ajout est validé'],
    10 => ['type' => 'alert-danger', 'msg' => 'Cet utilisateur n\'existe pas'],
    404 => ['type' => 'alert-danger', 'msg' => 'Une erreur SQL est survenue'],

];

// Ici on défini les variables de connection

define('DSN', 'mysql:host=localhost;dbname=hopital;charset=utf8');
define('LOGIN', 'root');
define('PASSWORD', '');


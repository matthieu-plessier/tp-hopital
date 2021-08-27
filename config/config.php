<?php
$messageCode = [

    2 => ['type' => 'alert-danger', 'msg' => 'Le patient existe déjà'],
    3 => ['type' => 'alert-success', 'msg' => 'Modifications validées !'],
    4 => ['type' => 'alert-danger', 'msg' => 'L\'id n\'est pas au bon format!!'],
    5 => ['type' => 'alert-success', 'msg' => 'L\'ajout est validé'],
    6 => ['type' => 'alert-danger', 'msg' => 'l\'id doit être renseigné!!' ],
    10 => ['type' => 'alert-danger', 'msg' => 'Cet utilisateur n\'existe pas'],
    404 => ['type' => 'alert-danger', 'msg' => 'Une erreur SQL est survenue'],
    11 => ['type' => 'alerte-danger', 'msg' => 'La date entrée n\'est pas valide'],
    12 => ['type' => 'alerte-success', 'msg' => 'Le rendez-vous est enregistré'],
    13 => ['type' => 'alerte-seccess', 'msg' => 'La date n\'est pas au bon format'],
];

// Ici on défini les variables de connection

define('DSN', 'mysql:host=localhost;dbname=hopital;charset=utf8');
define('LOGIN', 'root');
define('PASSWORD', '');


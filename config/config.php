<?php
$messageCode = [

    2 => ['type' => 'alert-danger', 'msg' => 'Le patient existe déjà'],
    3 => ['type' => 'alert-success', 'msg' => 'Modifications validées !'],
    4 => ['type' => 'alert-danger', 'msg' => 'L\'id n\'est pas au bon format!!'],
    5 => ['type' => 'alert-success', 'msg' => 'L\'ajout est validé'],
    6 => ['type' => 'alert-danger', 'msg' => 'l\'id doit être renseigné!!' ],
    10 => ['type' => 'alert-danger', 'msg' => 'Cet utilisateur n\'existe pas'],
    404 => ['type' => 'alert-danger', 'msg' => 'Une erreur SQL est survenue'],
    11 => ['type' => 'alert-danger', 'msg' => 'La date entrée n\'est pas valide'],
    12 => ['type' => 'alert-success', 'msg' => 'Le rendez-vous est enregistré'],
    13 => ['type' => 'alert-success', 'msg' => 'La date n\'est pas au bon format'],
    14 => ['type' => 'alert-success', 'msg' => 'Le rdv est bien supprimé !'],
    15 => ['type' => 'alert-success', 'msg' => 'Le patient est bien supprimé !'],
    16 => ['type' => 'alert-danger', 'msg' => 'Aucune correspondances trouvées'],

];

// Ici on défini les variables de connection

define('DSN', 'mysql:host=localhost;dbname=hopital;charset=utf8');
define('LOGIN', 'root');
define('PASSWORD', '');


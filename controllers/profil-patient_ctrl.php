<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../config/config.php');
$title = 'Profil du patient';
$code = NULL;

// On récup l'ID en GET
$id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));

// Récup le patient dans la BD

$resultCheckPatient = Patient::checkPatient($id);

if (!$resultCheckPatient) {
    $code = 10;
}

// Affichage des vues 
include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/profil-patient.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
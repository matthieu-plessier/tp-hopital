<?php

require_once(dirname(__FILE__).'/../models/Patient.php');

$title = "Liste des patients";
$error = "";

$patients = Patient::findAll();
if(is_object($patients)){
    $error = 'wrong';
}






include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../config/config.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

$title = "Ajout de rendez-vous";
$errors = [];
$code = null;

//recup id et nettoyage

$getId = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$patient = Patient::findAll();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!empty($idPatients)){
        $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$idPatients);
        if(!$testRegex){
            $error["idPatients"] = "L'id' n'est pas au bon format!!"; 
        } 
    } else { 
        $error["idPatients"] = "l'id doit être renseigné!!";
    }
    

    // date: nettoyage et validation
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));

    if(!empty($date)){
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        $year = date('Y', strtotime($date));
        $testDate = checkdate($month,$day,$year);
        if(!$testDate){
            $error["date"] = "La date entrée n'est pas valide !"; 
        }
    }
    // heure: nettoyage et validation
    $hour = trim(filter_input(INPUT_POST,'hour',FILTER_SANITIZE_STRING));

    if(!empty($hour)){
        $testRegex = preg_match('/'.REGEX_HOUR.'/',$hour);
        if(!$testRegex){
            $error ['hour']= 'L\'heure n\'est pas au bon format';
        }
    }else{
        $error['hour']= 'Vous devez entrer une heure';
    }

}



include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/ajout-rendezvous.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
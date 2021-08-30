<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../config/config.php');
require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');

$title = "Ajout de rendez-vous";
$codeArray = [];
$code = null;

function ShowTimeSelect()
{
    $hours = [];
    $minutes = [];

    for ($i=8; $i <= 20; $i++) { //Heures
        if($i < 10){
            $zero = "0".$i;
            array_push($hours, $zero);
        }else{
            array_push($hours, $i);
        }
    }
    for ($i=0; $i < 60; $i+=10) { //Minutes
        if($i < 10){
        $zero = "0".$i;
        array_push($minutes, $zero);
        }else{
        array_push($minutes, $i);
        }
    }

        //SHOW MINUTES
        echo "<div id='time' class='text-center'>";
        echo "<select name='hours'>";
            echo "<option>Heure</option>";
            foreach ($hours as $key => $value) {
                echo "<option value='$value'>$value</option>";
            }
        echo "</select>";

        echo " : ";
        //SHOW HOURS
        echo "<select name='minutes'>";
            echo "<option>Minute</option>";
            foreach ($minutes as $key => $value) {
                echo "<option value='$value'>$value</option>";
            }
        echo "</select>";
    echo "</div>";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $idPatients = trim(filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT));

    if(!empty($idPatients)){
        $testId = filter_var($idPatients, FILTER_VALIDATE_INT);
        if(!$testId){
            array_push($codeArray, 4); 
        } 
    } else { 
        array_push($codeArray, 6);
    }
    

    // date: nettoyage et validation
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));

    if(!empty($date)){
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        $year = date('Y', strtotime($date));
        $testDate = checkdate($month,$day,$year);
        if(!$testDate){
            array_push($codeArray, 13); 
        }
    }
    // heure: nettoyage et validation
    $hour = filter_input(INPUT_POST,'hours', FILTER_SANITIZE_NUMBER_INT);
    $minute = filter_input(INPUT_POST,'minutes', FILTER_SANITIZE_NUMBER_INT);
    $time = $hour.':'.$minute;

    if(!empty($time)){
        $testRegex = preg_match('/'.REGEX_HOUR.'/',$time);
        if(!$testRegex){
            $error ['hour']= 'L\'heure n\'est pas au bon format';
        }
    }else{
        $error['hour']= 'Vous devez entrer une heure';
    }
    if (empty($error)){
        $dateHour = $date.' '.$time;
        $patient = new Appointment($dateHour, $idPatients);
        //appel de la méthode creation du rendez-vous en base
        $code = $patient->addAppointment();
        array_push($codeArray, $code);
    }
}

$patient = Patient::findAll();

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/ajout-rendezvous.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
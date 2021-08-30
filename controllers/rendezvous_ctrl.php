<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../config/config.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

$title = 'Liste & Modification des Rendez-vous';
$code = NULL;

function ShowTimeSelect($timeArray)
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
                if($timeArray[0] == $value){
                    echo "<option value='$value' selected>$value</option>";
                }else{
                    echo "<option value='$value'>$value</option>";
                }
            }
        echo "</select>";

        echo " : ";
        //SHOW HOURS
        echo "<select name='minutes'>";
            echo "<option>Minute</option>";
            foreach ($minutes as $key => $value) {
                if($timeArray[1] == $value){
                    echo "<option value='$value' selected>$value</option>";
                }else{
                    echo "<option value='$value'>$value</option>";
                }
            }
        echo "</select>";
    echo "</div>";
}

// On récup l'ID en GET
$id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $hour = filter_input(INPUT_POST,'hours', FILTER_SANITIZE_NUMBER_INT);
    $minute = filter_input(INPUT_POST,'minutes', FILTER_SANITIZE_NUMBER_INT);
    $time = $hour.':'.$minute;

    $date = filter_input(INPUT_POST,'date', FILTER_SANITIZE_STRING);
    
    $dateHour = $date.' '.$time;

    if(empty($error)){
        $appoint = new Appointment($dateHour);
        $code  = $appoint->update($id);
    }
}

$appoint = new Appointment();
$result = $appoint->checkAppointment($id);

$arrayDateHour = explode(" ", $result->dateHour);
$timeArray = explode(":", $arrayDateHour[1]);

// Affichage des vues
include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/rendezvous.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
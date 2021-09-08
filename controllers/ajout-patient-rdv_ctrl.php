<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../config/config.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

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





















include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/ajout-patient-rdv.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
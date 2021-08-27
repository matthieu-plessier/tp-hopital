<?php

require_once(dirname(__FILE__).'/../models/Appointment.php');

$title = "Liste des Rendez-vous";
$error = "";

$appointments = Appointment::findAllAppointment();
if (is_array($appointments)) {
    //Pour avoir date dans le bon sens

    foreach($appointments as $patient):
        $birth = $patient->dateHour;
        $timeStamp = strtotime($birth);
        $newDate = date("d-m-Y",$timeStamp);
        $patient->dateHour = $newDate;
    endforeach;
    
}else{
    $error = "wrong";
}




include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-rendezvous.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
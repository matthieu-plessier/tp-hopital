<?php
$code = null;


require_once(dirname(__FILE__).'/../models/Appointment.php');
session_start();

$title = "Liste des Rendez-vous";
$error = '';

////////////////////////////////////////////////////// DELETE RDV ///////////////////////////////////////////////////////////////////////////////////

if(!empty($_GET['remove'])){
    $removeId = intval(trim(filter_input(INPUT_GET, 'remove', FILTER_SANITIZE_NUMBER_INT)));
    $deleteAppoint = new Appointment("","",$removeId);
    $code = $deleteAppoint->deleteAppointment();
}

////////////////////////////////////////////////////// LISTE DES RDV ///////////////////////////////////////////////////////////////////////////////////

$appointments = Appointment::findAllAppointment();

if (is_array($appointments)) {

    //Pour avoir date dans le bon sens
    foreach($appointments as $patient):
        $birth = $patient->dateHour;
        $timeStamp = strtotime($birth);
        $newDate = date("d-m-Y".' '."H:i",$timeStamp);
        $patient->dateHour = $newDate;
    endforeach;
    
}else{
    $error = "wrong";
}










include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-rendezvous.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
<?php

require_once(dirname(__FILE__).'/../models/Patient.php');

$title = "Liste des patients";
$error = "";





$patients = Patient::findAll();
if (is_array($patients)) {
    //Pour avoir date dans le bon sens

    foreach($patients as $patient):
        $birth = $patient->birthdate;
        $timeStamp = strtotime($birth);
        $newDate = date("d-m-Y",$timeStamp);
        $patient->birthdate = $newDate;
    endforeach;
    
}else{
    $error = "wrong";
}







include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
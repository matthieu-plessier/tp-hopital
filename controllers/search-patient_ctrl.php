<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../config/config.php');


if($_SERVER["REQUEST_METHOD"] == "GET"){

    $lastname = trim(filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    
    $resultSearch = new Patient($lastname);
    $patients = $resultSearch->searchPatient();
    $messerror = NULL;
    if (empty($patients)) {
        $messerror = $messageCode[16];
    }else{
        foreach($patients as $patient):
            $birth = $patient->birthdate;
            $timeStamp = strtotime($birth);
            $newDate = date("d-m-Y",$timeStamp);
            $patient->birthdate = $newDate;
        endforeach;
    
}

}
include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
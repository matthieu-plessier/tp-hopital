<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../config/config.php');
require_once(dirname(__FILE__).'/../utils/regex.php');
$title = 'Profil du patient';
$code = NULL;

// On récup l'ID en GET
$id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Lastname : Nettoyage et validation
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if(!empty($lastname)){
        $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$lastname);
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if(!$testRegex){
            $error["lastname"] = "Le nom n'est pas au bon format !!"; 
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if(strlen($lastname)<=1 || strlen($lastname)>=70){
                $error["lastname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["lastname"] = "Vous devez entrer un nom !!";
    }

    // firstname : Nettoyage et validation
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($firstname)){
        $testRegex = preg_match('/'.REGEX_STR_NO_NUMBER.'/',$firstname);
        if(!$testRegex){
            $error["firstname"] = "Le prénom n'est pas au bon format !!"; 
        } else {
            if(strlen($firstname)<=1 || strlen($firstname)>=70){
                $error["firstname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }else { // Pour les champs obligatoires, on retourne une erreur
        $error["lastname"] = "Vous devez entrer un prénom !!";
    }

    // email : Nettoyage et validation
    $email = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    if(!empty($email)){
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if(!$testEmail){
            $error["mail"] = "L'adresse email n'est pas au bon format !!"; 
        }
    } else {
        $error["mail"] = "L'adresse mail est obligatoire !!"; 
    }
    // phone : Nettoyage et validation
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));
    $phone = str_replace(["-"], [], $phone);

    if(!empty($phone)){
        $testRegex = preg_match('/'.REGEX_PHONE_NUMBER.'/',$phone);
        if(!$testRegex){
            $error["phone"] = "Vous devez entrer un numéro de téléphone valide"; 
        }
    }

    // birthdate : Nettoyage et validation
    $birthdate = trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING));

    if(!empty($birthdate)){
        $month = date('m', strtotime($birthdate));
        $day = date('d', strtotime($birthdate));
        $year = date('Y', strtotime($birthdate));
        $testDate = checkdate($month,$day,$year);
        if(!$testDate){
            $error["birthdate"] = "La date entrée n'est pas valide !"; 
        }
    }
    if(empty($error)){
        $patient = new Patient($lastname, $firstname, $birthdate, $phone, $email);
        $code  = $patient->update($id);
        
    }

}
// Récup le patient dans la BD

$resultCheckPatient = Patient::checkPatient($id);

if (!$resultCheckPatient) {
    $code = 10;


/////////////////////////////////////////////////////////// LISTE DES RDV /////////////////////////////////////////////////////////////////////////////


}
$appoint = new Appointment();
$appointments = $appoint->userAppointments($id);

if (is_array($appointments)) {

/////// Pour avoir date dans le bon sens /////////
    foreach($appointments as $rdv):
        $birth = $rdv->dateHour;
        $timeStamp = strtotime($birth);
        $newDate = date("d-m-Y".' '."H:i",$timeStamp);
        $rdv->dateHour = $newDate;
    endforeach;
    
}else{
    $error = "wrong";
}
// Affichage des vues 
include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/profil-patient.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
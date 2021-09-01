<?php
require_once(dirname(__FILE__).'/../models/Patient.php');

$error = [];


if(empty($error)){

    $id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $patient = new Patient($id);
    $code  = $patient->deletePandA($id);
    header('Location: /controllers/liste-patient_ctrl.php');
    }
<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
$class = new Patient();
$patients = $class->findAll();



include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
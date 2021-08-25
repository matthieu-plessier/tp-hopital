<?php
// Name, FirstName, Nationality, City, Diplome, Activity
define('REGEX_STR_NO_NUMBER', "^[A-Za-z-éèêëàâäôöûüç' ]*$");

// Date de naissance
define('REGEX_NUMBER_DATE_OF_BIRTH', "^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|(1)[0-2]))(\/)\d{4}$");

// Adresse
define('REGEX_STR_NUMBER_ADDRESS', "^[0-9]{1,6}[A-Za-z0-9-éèêëàâäôöûüç .,-]+$");

// Code Postal
define('REGEX_ZIP', "^(([0-8][0-9])|(9[0-5]))[0-9]{3}$");

// Email
define('REGEX_EMAIL', "^[a-z0-9\_.-]+@[a-z0-9]+\.[a-z]{2,6}$");

// Numéro de téléphone
define('REGEX_PHONE_NUMBER', "^([0-9]{1,3}[0-9]{9})|[0-9]{7,15}$");

// Numéro Pole Emploi
define('REGEX_ID_POLE_EMPLOI', "^[0-9]{7}[A-Z]{1}$");

// Badge (1 à 199)
define('REGEX_NUMBER_BADGE', "^[0-9]{0,2}|[1]?[0-9]{2}$");

// SIRET
define('REGEX_SIRET', "^[0-9]{14}$");

// PassWord
define('REGEX_PASSWORD', "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$");

// Envoyer image
define('REGEX_FILE', "^.+\.(jpe?g|png)$");

// Pseudo
define('REGEX_PSEUDO', "^[a-zA-Z]{1,20}[0-9]{0,3}$");

//Heure
define('REGEX_HOUR', '^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$')
?>

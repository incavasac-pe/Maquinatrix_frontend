<?php 

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();
 
$google_client->setRedirectUri('https://maquinatrix.com');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?> 
<?php 

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('873526772906-nu9so6k10nilitq1qtf1dd63tlooo1up.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Maquinatrix_frontend/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?> 
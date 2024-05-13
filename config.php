<?php 

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';
$clientId = getenv('CLIENTID');
$secretKey = getenv('SECRETKEY');

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId($clientId); 
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret($secretKey); 

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://maquinatrix.com/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>
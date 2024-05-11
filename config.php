<?php 

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
//$google_client->setClientId('257422679122-3c6egr7hrl34p7hik6emckf99rqgbn8f.apps.googleusercontent.com');
$google_client->setClientId('xxx');

//Set the OAuth 2.0 Client Secret key
//$google_client->setClientSecret('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');
$google_client->setClientSecret('xxxx');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://maquinatrix.com');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?> 
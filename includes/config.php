<?php

// Google API configuration


// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
require_once 'vendor/autoload.php';

// Call Google API
$client = new Google\Client();
$client->setApplicationName('Login to coderglass.com');
$client->setClientId(GOOGLE_CLIENT_ID);
$client->addScope(Google\Service\Forms::FORMS_RESPONSES_READONLY);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$client->setRedirectUri($redirect_uri);



?>
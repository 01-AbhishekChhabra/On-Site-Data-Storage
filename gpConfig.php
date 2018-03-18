<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '301912166184-oh4jras64rmgsnoj0qvdupbf40vf7mlh.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'qFlN9wxnylclObUN3wS_sScE'; //Google client secret
$redirectURL = 'http://localhost/fileSS/upload3.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Online File Storage');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
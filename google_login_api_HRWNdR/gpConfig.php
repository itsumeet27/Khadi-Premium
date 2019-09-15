<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '192676492612-g5mt7b0vs89848llcrov0m1ai8g8p3t0.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'QCNNI9TNeY5uYPqQ-3iQyE5k'; //Google client secret
$redirectURL = 'http://localhost/khadi/google_login_api_HRWNdR'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to khadipremium.in');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
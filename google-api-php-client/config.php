<?php
// session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '1047111258961-rcnte90rdifj70smba35cvs7i3qsq1cc.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = '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'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/zoy-care/web/google-api-php-client/account.php/';  //return url (url to script)
// $redirectUrl = 'https://zoygirl.com/google-api-php-client/account.php/';
$homeUrl = 'http://localhost/zoy-care/web/google-api-php-client/';  //return to home
// $homeUrl = 'https://zoygirl.com/google-api-php-client/';

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to zoygirl.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
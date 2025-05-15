<?php
include_once("google-api-php-client/config.php");
session_start(); //to ensure you are using same session

if (isset($_SESSION['token']) && isset($_SESSION['google_data'])) {
    unset($_SESSION['token']);
    unset($_SESSION['google_data']); //Google session data unset
    $gClient->revokeToken();
}


session_destroy(); //destroy the session
ob_start();
//to redirect back to login Page after logging out
header("Location: index.php");
die();
?>
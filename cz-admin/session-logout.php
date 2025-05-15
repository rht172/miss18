<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
ob_start();
//to redirect back to login Page after logging out
header("Location: login.php");
die();
?>
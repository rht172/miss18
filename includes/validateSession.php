<?php session_start();
ob_start();

if (isset($_SESSION['email'])) {
    // logged in
} else {
    // not logged ins
    header("Location: sign-up-form.php");
    die();
}


?>
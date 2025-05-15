<?php
// Set the session timeout to 1 week (604800 seconds) before starting the session
ini_set('session.gc_maxlifetime', 604800);

// Optionally, you can also set the session cookie lifetime
// to match the session timeout
ini_set('session.cookie_lifetime', 604800);

// Start the session
session_start();
ob_start();

// Continue with your script

if (isset($_SESSION['user_name'])) {
    // logged in
} else {
    // not logged in
    header("Location: login.php");
    die();
}
?>
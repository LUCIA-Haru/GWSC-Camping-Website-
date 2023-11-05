<?php
session_start(); // Start or resume the current session

// Check if the user is already logged in
if (isset($_SESSION['CId'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other desired page
    header("Location: Home.php");
    exit();
} else {
    // If the user is not logged in, you can redirect them to a different page or display a message
    header("Location: CustomerLogin.php");
    exit();
}
?>

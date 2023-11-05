<?php
session_start();

include('Connection.php');
// Set the URL to redirect to
$redirectURL = 'CustomerLogin.php';

// Set the delay time in seconds (10 minutes = 600 seconds)
$delay = 600;

// Set the message to display (optional)
$message = 'You will be redirected to the Login page in 10 minutes.';

// Send an HTTP header to the browser to delay the redirect
header("Refresh: $delay; URL=$redirectURL");

// Output an HTML message to the browser
echo "<html><body>";
if (!empty($message)) {
    echo "<p>$message</p>";
}

echo "</body></html>";
?>

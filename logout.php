<?php
session_start();
// Unset all session variables
$_SESSION = [];
// Destroy the session.
session_unset();
// Redirect to login page
header("Location: Log-In-Page.php");
exit;
?>

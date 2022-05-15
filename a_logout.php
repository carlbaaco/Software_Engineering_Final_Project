<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: adminlogin.php"); // Redirecting To Home Page
}
?>
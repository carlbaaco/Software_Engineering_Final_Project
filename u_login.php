<?php
session_start(); 


if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
echo '<script>alert("Username or Password is invalid")</script>';
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require 'connection.php';
$conn = Connect();

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT username, password FROM customer WHERE username=? AND password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt -> bind_param("ss", $username, $password);
$stmt -> execute();
$stmt -> bind_result($username, $password);
$stmt -> store_result();

if ($stmt->fetch())  
{
	$_SESSION['customer']=$username; // Initializing Session
	header("location: cakes.php"); // Redirecting To Other Page
} else {
echo '<script>alert("Username or Password is invalid")</script>';
}
mysqli_close($conn); // Closing Connection
}
}
?>
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
require 'connection.php';
$conn = Connect();

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT username, password FROM admin WHERE username=? AND password=? LIMIT 1";

$stmt = $conn->prepare($query);
$stmt -> bind_param("ss", $username, $password);
$stmt -> execute();
$stmt -> bind_result($username, $password);
$stmt -> store_result();

if ($stmt->fetch())  
{
	$_SESSION['admin']=$username; // Initializing Session
	header("location: add_cake.php"); // Redirecting To Other Page
} else {
echo '<script>alert("Username or Password is invalid")</script>';
}
mysqli_close($conn); // Closing Connection
}
}
?>
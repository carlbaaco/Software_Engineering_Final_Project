<?php

function Connect()
{
	$dbhost = "sql309.epizy.com";
	$dbuser = "epiz_31694944";
	$dbpass = "OkJ88nqz1nqQUD";
	$dbname = "epiz_31694944_janenawang";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

	return $conn;
}
?>
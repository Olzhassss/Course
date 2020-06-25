<?php
	//Variables required for mysqli
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appletree";
	
	// Create connection
	$connection = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($connection->connect_error)
	{
	    die("Connection failed: " . $conn->connect_error);
	}  
?>
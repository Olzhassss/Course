<?php 
$temp = "..";
	include_once('../root.php');
	
	require_once $connection_config;
	session_start();
$_SESSION = [];

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-1, '/');
}

session_destroy();

header('Location:sign_in.php');
 ?>
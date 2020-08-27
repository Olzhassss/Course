<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	
	require_once ($connection_config);
	session_start();
$_SESSION = [];

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-1, '/');
}

session_destroy();

header('Location:sign_in.php');
 ?>
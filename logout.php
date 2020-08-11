<?php 
require_once 'connection_config.php';

$_SESSION = [];

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-1, '/');
}

session_destroy();

header('Location:sign_in.html');
 ?>
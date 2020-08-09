<?php 
require_once 'connection_config.php';

if ( isset($_SESSION['user_login']) ) {
	if (isset($_COOKIE['visits']))
		{
			setcookie('visits', ++$_COOKIE['visits'], time() + 5);
		}
		else
		{
			setcookie('visits', 1, time() + 5);
			$_COOKIE['visits'] = 1;
		}
	echo "Welcome! ";
	echo "Visited: " . $_COOKIE['visits'] . PHP_EOL;
	echo "<a href = 'logout.php'> Log out </a>" ;
} else
{
	exit;
}


 ?>
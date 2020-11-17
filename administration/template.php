<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 

require_once ($connection_config);
session_start();

if (!isset($_SESSION['user_login'])){
	header('Location:sign_in.php');
}

if (!isset($_POST['temp']) || is_null($_POST['temp'])) {
	header('Location:admin_main.php');
}

switch ($_POST['temp']) {
	case 'applications':
		require_once ("schedule_temp.php");
		break;
	case 'staff':
		echo "Staff edit page";
		break;
	case 'classes':
		echo "Classes edit page";
		break;
	case 'frontEdit':
		echo "Front page edit page";
		break;
	default:
		echo "Error";
		break;
}
exit;
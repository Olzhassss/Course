<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	
	require_once $connection_config;
	session_start();

	if (!isset($_SESSION['user_login'])) {
		header('Location:sign_in.php');
	}
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
	}

	$title = 'Administration page';
	$customStylesheets_array = array("headerAdmin.style.css");
	
?>
<!DOCTYPE html>
<html>
<?php require_once($head_pathname); ?>
<body>
	<?php require_once($headerAdmin_pathname) ?>
	<?php 
	  echo "Welcome! ";
	  echo "Visited: " . $_COOKIE['visits'] . PHP_EOL;
	  echo "<a href = 'logout.php'> Log out </a>" ;
	?>
</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php/*
foreach ($custom_scripts as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }*/
?>

</html>

<?php 
	$temp = "..";
	include_once('../root.php');
	
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
	  echo "Welcome! ";
	  echo "Visited: " . $_COOKIE['visits'] . PHP_EOL;
	  echo "<a href = 'logout.php'> Log out </a>" ;
	}
?>
<?php
	include_once('./root.php');
	include_once($connection_config);
	//session_start();
	//$username = "";
	$title = 'Administration page';
	$custom_stylesheets = array("header.style.css", "footer.style.css");
	$custom_scripts = array("");	
?>
<!DOCTYPE html>
<html>
<?php include_once($head_uri); ?>
<body>
	<?php include_once($header_uri); ?>


	<?php
	include_once($footer_uri);
	?>
</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php
foreach ($custom_scripts as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>

</html>

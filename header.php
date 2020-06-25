<!-- BEGINNING OF THE HEADER FILE, HTML -->
<!doctype html>
<html>
<body>
  <head>  	
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  	<!-- Stylesheets import - custom and Bootstrap.min.css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheets/header.style.css">
    <title>
    	<!-- A condition for default and custom page title. To attach custom title it must be defined before including 'header.php' -->
    	<?php
    	if(isset($title))
    	{
    		echo $title;
    	}
    	else
    	{
    		echo 'Olzhas\'s website';
    	}
    	?>
    </title>	
  </head>
<header>
	<!-- Header content wrapper div -->
	<div id="headerdiv" class="d-flex flex-column flex-md-row align-items-center p-3 mb-5 border-bottom shadow-sm" >
		<!-- Logo and title referencing to the main webpage -->
		<a href="index.php" class="link">
			<img src="images/logo.PNG" hspace="0" alt="logo">
		</a>
		<h4  class=" mr-md-auto font-weight-normal" >
			<a class="link" href="index.php">
				<font style="color:lightgreen; font-family:Courier;"> AppleTree English courses!</font>
			</a>
		</h4>
		<!-- End of Logo and title -->
		<!-- Navigation row -->
		<nav class="my-2 my-md-0 mr-md-2">
		    <a class="p-2 text-light" href="contacts.php">Contacts</a>
		    <a class="p-2 text-light" href="index.php">Managing</a>
		    <a class="p-2 text-light" href="index.php">View schedule</a>
		</nav>
		<!-- End of navigation -->
		<a class="btn btn1 ml-3 " href="index.php">Application</a>
	</div>
</header>
<!-- END OF FILE -->
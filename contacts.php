<!-- BEGINNING OF THE FILE -->
<!--Including header via PHP -->
<?php include_once('header.php');?>
<!-- BEGINNING OF HTML -->
<head>
	<!-- Importing custom styles -->
	<link rel="stylesheet" href="stylesheets/contacts.style.css">
</head>
<!-- Page content wrapper div -->
<div class="container contacts-div">
	<div class="row">
		<p style="text-align: justify;">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			<img src="images/contacts1.jpg" vspace="5" hspace="5">
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			<br></br> 
			А на этой странице вы можете найти полезные контакты AppleTree!
		</p>
	</div>
	<!-- Here contacts of the administration and chief teachers will be placed -->
	<!-- AUTOMATE THIS PROCEDURE -->
	<div class="row">
		<font class="contacts">
			<h1>Admin: xxx-xxx-xx-xx</h1>
		</font>
	</div>
</div>
<!-- Changing custom styles for the page via JavaScript -->
<script>
	document.body.style.backgroundImage = "url(images/contactbackground.jpg)";
	document.getElementById('headerdiv').style.backgroundColor = "black";
	document.getElementById('footer-maintext').style.color = "white";
</script>
<!-- Including footer via PHP -->
<?php include_once('footer.php'); ?>
<!-- END OF FILE -->
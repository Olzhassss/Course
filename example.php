<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
	require_once($connection_config);

	$title = 'AppleTree main page';
	// Storing all necessary files in arrays for further import
	$customStylesheets_array = array("header.style.css", "footer.style.css");
	// Storing little style adjustments for further amendment 
	$customStyles_css = "#section-pricing { padding-bottom: 0px;}";

	$spinner_src = $imgs . "spinner.gif";
?>
<!DOCTYPE html>
<html lang="en">
<!-- Importing head tag -->
<?php require_once($head_ldp); ?>
<body>
	<!-- Importing the header -->
	<?php require_once($header_ldp); ?>
	
	<div class="container">
		<div class="d-flex flex-row justify-content-between pt-3">
			<div>
				<h1>Name Surname (id)</h1>	
				<p><i>Birth year, gender</i></p>
			</div>
			<div class="mt-2">
				<h2>Application date</h2>
			</div>
		</div>
		<h4>
			<div class="d-flex">
				<span class="p-2 text-right w-25"></span><span class="ml-3 p-2">dsad</span>
			</div>
			<div class="d-flex">
				<div class="d-flex p-2 flex-column text-right">
					<div class="p-2">Contact phone number:</div>
					<div class="p-2">Contact email:</div>
					<div class="p-2">Working experience:</div>
					<div class="p-2">Education level:</div>
					<div class="p-2">Summary:</div>
				</div>
				<div class="ml-3 p-2 w-75">
					<div class="p-2">Phone number</div>
					<div class="p-2">email</div>
					<div class="p-2">exp</div>
					<div class="p-2">lvl</div>
					<div class="p-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint unde maiores cum laboriosam aliquid at, officiis itaque libero delectus, corporis, a iure maxime odit, repellendus obcaecati. Repellendus, veniam. Iusto, laborum.</div>
				</div>
			</div>
		</h4>
	</div>
	<!-- Importing the footer -->
	<?php require_once($footer_ldp); ?>
</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

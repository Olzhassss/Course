<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);

	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}

	$title = 'Administration page';
	$customScripts_array = array("loader.js");
	$customStylesheets_array = array("headerAdmin.style.css", "loader.style.css");
	$spinner_src = $imgs . "spinner.gif";
?>
<!DOCTYPE html>
<html>
<?php require_once($head_ldp); ?>
<body>
	<?php require_once($headerAdmin_ldp); ?>
	<div id="loader_div" class="loader">
		<img src="<?=$spinner_src?>" alt="spinner">
	</div>

	<div id="body">
		
	</div>

</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	// Attaching the 'loadPage' function to the 'Sign in!' button click event via id
	$(document).ready(function(){
		$(".header-button").click(loadPage);
		fix_loader("loader_div");
	})

	// Executes Ajax and manages error text
	function loadPage(event)
	{
		event.preventDefault();
		let data = $(this).attr("data-essence");
		$.ajax({
			url: "<?=$router_url?>",
			type: 'POST',
			cache: false,
			data: { 'temp': data },
			beforeSend: function() {
				$("#loader_div").removeClass("hidden");
				$("#body").empty();
			},
			success: function(data){
				if (data==1){
					console.error("'loadPage' function: Unknown url submitted!");
					return;
				}
				try	{
					$( "#body" ).load( data, {'url':"<?=$url?>"} );
				}
				catch(error)
				{
					console.error("'loadPage' function: Error occured!");
				}
				
			}
		})

		$("#loader_div").addClass("hidden");
	}
</script>
<?php foreach ($customScripts_array as $value){	echo "<script src='$js$value'></script>".PHP_EOL; } ?>
</html>

<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	
	require_once ($connection_config);
	session_start();

	if (!isset($_SESSION['user_login'])) {
		header('Location:sign_in.php');
	}
	

	$title = 'Administration page';
	$customScripts_array = array("loader.js");
	$customStylesheets_array = array("headerAdmin.style.css", "loader.style.css");
	$spinner_src = $imgs . "spinner.gif";
?>
<!DOCTYPE html>
<html>
<?php require_once($head_pathname); ?>
<body>
	<?php require_once($headerAdmin_pathname); ?>
	<div id="loader_div" class="loader">
		<img src="<?=$spinner_src?>" alt="spinner">
	</div>

	<div id="body">
		
	</div>

</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php foreach ($customScripts_array as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>
<script>
	// Attaching the 'loadPage' function to the 'Sign in!' button click event via id
	$(document).ready(function(){
		$(".header-link").click(loadPage);
		fix_loader("loader_div");
	})

	// Executes Ajax and manages error text
	function loadPage(event)
	{
		event.preventDefault();


		//$( "#body" ).load( "template.php", {'temp':$(this).attr("essence")});
		//console.log($(this).attr("essence"));
		$.ajax({
			url: 'template.php',
			type: 'POST',
			cache: false,
			data: { 'temp':$(this).attr("essence") },
			beforeSend: function() {
				$("#loader_div").removeClass("hidden");
			},
			success: function(data){
				try	{
					$("#body").html(data);
					//$( "#body" ).load( data, {'url':"<?=$url?>"} );
				}
				catch(error)
				{
					console.error("Error occured"+error.message());
				}
				
			}
		})

		$("#loader_div").addClass("hidden");
	}
</script>
</html>

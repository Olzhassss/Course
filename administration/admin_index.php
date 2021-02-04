<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);

	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}

	$title = 'Administration page';
	$spinner_src = $imgs . 'spinner.gif';
	// Store all necessary files in arrays for further import
	$customScripts_array = array('loader.js');
	$customStylesheets_array = array('headerAdmin.style.css', 'loader.style.css', 'tables.style.css');
	$customStyles_css = ".hover:hover{ background-color: #e2e6ea;} .hover{ transition: background-color .15s ease-in-out; background-color: #f8f9fa;}"
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
	<!-- Empty div to prevent instant page offset shifts -->
	<div style="margin-bottom: 45vw;"></div>
</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	// Binding the 'loadPage' function to the 'Sign in!' button click event via class
	$(document).ready(function(){
		$(".header-button").click(loadPage);
		fix_loader("loader_div");
	})

	// Executes Ajax and manages error text
	function loadPage(event, role = null)
	{
		event.preventDefault();
		let data = $(this).attr("data-essence");
		$.ajax({
			url: "<?=$router_url?>",
			type: 'POST',
			cache: false,
			data: {'temp': data},
			beforeSend: function() {
				$("#loader_div").removeClass("hidden");
			},
			success: function(response){
				if (response=="False"){
					console.error("'loadPage' function: Unknown url submitted!");
					return;
				}
				try	{
					$("#body").empty();
					$("#body").load( response, {'url':"<?=$url?>", 'role': role} );
				}
				catch(error)
				{
					console.error("'loadPage' function: "+error);
				}
				
			}
		})
		$("#loader_div").addClass("hidden");
	}
</script>
<?php foreach ($customScripts_array as $value){	echo "<script src='$js$value'></script>".PHP_EOL; } ?>
</html>

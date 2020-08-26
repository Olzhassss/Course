<?php
	$temp = "..";
	include_once('../root.php');
	include_once($connection_config);
	//session_start();
	//$username = "";
	$title = 'Authorization';
	$custom_stylesheets = array("loader.style.css", "back-link.style.css");
	$custom_scripts = array("loader.js", "validate_single.js");
	//$custom_styles = "";
	$spinner_src = $imgs . "spinner.gif";

	session_start();
	if (isset($_SESSION['user_login'])) {
		header('Location:admin_main.php');
	}
?>
<!DOCTYPE html>
<html>
<?php include_once($head_uri); ?>
<body>
	<?php include_once($back_link_uri); ?>
	<div id="loader_div" class="loader hidden">
		<img src="<?=$spinner_src?>" alt="spinner">
	</div>
	<section id="section-form">
		<form>
			<div class="container">
				<div class="row py-3">
					<div class="col-xs-12 col-sm-8 col-md-4">
					    <label for="login-field">Login</label>
					    <input name="login" type="text" class="form-control" id="login-field" pattern="[0-9a-zA-Z]{1,20}" required="true">
					</div>
				</div>
				<div class="row py-3">
					<div class="col-xs-12 col-sm-8 col-md-4">
					    <label for="password-field">Password</label>
					    <input name="password" type="password" class="form-control" id="password-field"  pattern="[0-9a-zA-Z]{1,}" required="true">
					</div>
				</div>
				<div class="row py-3">
					<div class="col-xs-10 col-sm-6 col-md-3">
						<input type="submit" id="submit" class="btn btn-primary my-2 w-100" value="Sign in!">
						<small id="error_0" class="form-text text-danger"></small>
					</div>
				</div>
			</div>
		</form>
	</section>
	
	

</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	// Attaching 'click' function to the 'Sign in!' button via id
	$(document).ready(function(){
		$("#submit").click(submit);
		fix_loader("loader_div");
	})
	
	function submit(event)
	{
		event.preventDefault();

		var error_field = $("#error_0");
		error_field.text("");

		if(validate_single('login-field') && validate_single('password-field'))
		{

			$.ajax({
				url: 'authorization.php',
				type: 'POST',
				cache: false,
				data: { 'login':$("#login-field").val(), 'password':$("#password-field").val() },
				beforeSend: function() {
					$("#loader_div").removeClass("hidden");
				},
				success: function(data){
					if (data == 0)
					{
						window.location.replace("admin_main.php");
						return;
					}
					else
					{
						error_field.text("Wrong login or password");
					}
				}
			})
		}

		$("input[name='password'").val("");
		$("#loader_div").addClass("hidden");
	}

</script>
<?php
foreach ($custom_scripts as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>

</html>

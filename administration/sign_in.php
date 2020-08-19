<?php
	$temp = "..";
	include_once('../root.php');
	include_once($connection_config);
	//session_start();
	//$username = "";
	$title = 'Authorization';
	$custom_stylesheets = array("loader.style.css");
	//$custom_scripts = array("validate_text.js");
	//$custom_styles.= "";
	$spinner_src = $imgs . "spinner.gif";
?>
<!DOCTYPE html>
<html>
<?php include_once($head_uri); ?>
<body>
	<div id="loader_div" class="loader hidden">
		<img src="<?=$spinner_src?>" alt="spinner">
	</div>
	<section id="section-header">
		<div class="d-flex flex-column flex-md-row align-items-center p-3">
			<h3 class="m-2 border border-success rounded-right py-2 px-3">
				<a href="<?=$index?>" class="text-success text-decoration-none"><= Back to main page</a>
			</h3>
		</div>
	</section>
	<section id="section-form">
		<form>
			<div class="container">
				<div class="row py-3">
					<div class="col-xs-12 col-sm-8 col-md-4">
					    <label for="login-field">Login</label>
					    <input name="login" type="text" class="form-control" id="login-field" pattern="[A-Za-z]{1}[0-9a-zA-Z]{4,20}" required="true">
					</div>
				</div>
				<div class="row py-3">
					<div class="col-xs-12 col-sm-8 col-md-4">
					    <label for="password-field">Password</label>
					    <input required="true" name="password" type="password" class="form-control" id="password-field"  pattern="[0-9a-zA-Z]{1,}" >
					</div>
				</div>
				<div class="row py-3">
					<div class="col-xs-10 col-sm-6 col-md-3">
						<input type="submit" id="submit" class="btn btn-primary my-2 w-100">
							Sign in!
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
		$("#loader_div").css("display","flex");
		$("#submit").click(submit);
	})
	
	function submit(event)
	{
		event.preventDefault();
		login = $("input[name='login']");
		password = $("input[name='password'");
		var text;
		if(login.val() != "" && password.val() != "")
		{
			
			$.ajax({
				url: 'authorization.php',
				type: 'POST',
				cache: false,
				data: { 'login':login.val(), 'password':password.val()},
				beforeSend: function() {
					$("#loader_div").removeClass("hidden");
				},
				success: function(data){
					if (data == 0)
					{
						window.location.replace("admin.php");
						return;
					}
					else
					{
						$("input[name='password'").val("");
						$("#loader_div").addClass("hidden");
						text = "Wrong login or password!";
						return;
					}
				},
				error: function(e){
					alert(e.text());
				}
			})
		}
		else
		{
			$("input[name='password'").val("");
			login.addClass("error");
			password.addClass("error");
			text = "Please fill the spaces!";
		}
		$("#error_0").text(text);
	}

</script>
<!--<?php
foreach ($custom_scripts as $value)
    {
   		//echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>-->

</html>

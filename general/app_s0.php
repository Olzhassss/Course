<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	$custom_styles = " .choice_button{ width: 100%; font-size: 2rem;}";
	$custom_stylesheets = array("back-link.style.css");
?>

<!-- BEGINNING OF HTML -->
<!DOCTYPE html>
<html lang="en">
	<?php require_once($head_uri); ?>
<body>
	<a class="nav-link" href="<?=$back_link;?>" id="back-link"><-Back</a>

	<br></br>
	<div class="mt-5">
		<!-- Creating and filling teacher application form -->
		<form method="post" action="">
			<div class="container">
				<div class="row mb-2">
					<p class="alert display-4"><b>For new student applicants!</b></p>
				</div>
				<form method="post" action="?" style="height: 200px;">
					<p class="alert alert-success display-4">Please choose would you like to have group or private lessons</p> 
					<div class="row mb-3">
						<div class="col-md"></div>
						<div class="col-12 col-sm-6 col-md-4 my-3">
							<a href="<?=$app_std_group;?>" class="btn btn-secondary py-4 choice_button">Group lessons</a>
						</div>
						<div class="col-12 col-sm-6 col-md-4 my-3">
							<a href="<?=$app_std_private;?>" class="btn btn-secondary py-4 choice_button">Private lessons</a>
						</div>
						<div class="col-md"></div>	
					</div>
					<br>
				</form>
			</div>
			<br></br>
 		</form>
 	</div>
</div>
</body>
</html>
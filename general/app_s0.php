<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	$customStylesheets_array = array("back-link.style.css");
	$customStyles_css = " .choice_button{ width: 100%; font-size: 2rem;}";

?>

<!-- BEGINNING OF HTML -->
<!DOCTYPE html>
<html lang="en">
	<?php require_once($head_pathname); ?>
<body>
	<?php require_once($backLink_pathname); ?>
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
							<a href="<?=$appStdGroup_href?>" class="btn btn-secondary py-4 choice_button">Group lessons</a>
						</div>
						<div class="col-12 col-sm-6 col-md-4 my-3">
							<a href="<?=$appStdPrivate_href?>" class="btn btn-secondary py-4 choice_button">Private lessons</a>
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
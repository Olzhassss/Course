<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

	$customStylesheets_array = array("back-link.style.css");
	$customStyles_css = ".choice_button{ width: 100%; font-size: 2rem;}";

?>

<!-- BEGINNING OF HTML -->
<!DOCTYPE html>
<html lang="en">
	<?php require_once($head_ldp); ?>
<body>
	<?php require_once($backLink_ldp); ?>
	<br></br>
	<div>
			<div class="container">
				<div class="row mb-2">
					<p class="alert display-4"><b>For new student applicants!</b></p>
				</div>
					<p class="alert alert-success display-4 pb-4">Please choose whether you like to have group or private lessons</p> 
					<div class="row mb-3">
						<div class="col-md"></div>
						<div class="col-12 col-sm-6 col-md-4 my-3">
							<a href="<?=$appStdGroup_url?>" class="btn btn-secondary py-4 choice_button">Group lessons</a>
						</div>
						<div class="col-12 col-sm-6 col-md-4 my-3">
							<a href="<?=$appStdPrivate_url?>" class="btn btn-secondary py-4 choice_button">Private lessons</a>
						</div>
						<div class="col-md"></div>	
					</div>
					<br>
			</div>
			<br></br>
 	</div>
</div>
</body>
</html>
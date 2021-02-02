<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
	require_once($connection_config);

	$title = 'Apply now!';
	$customStylesheets_array = array("header.style.css", "footer.style.css");
	$customStyles_css = ".choice_button{ width: 100%; padding-top: 20px; padding-bottom: 20px;	font-size: 2rem; } #section-main{ padding-bottom: 0px; }";
?>


<!DOCTYPE html>
<html lang="en">
	<?php require_once($head_ldp); ?>
<body>
 	<?php require_once($header_ldp); ?>
	<section id="section-main">
		<div class="container py-5">	
			<div class="row">
					<!-- Creating and filling teacher application form -->
				<div class="col-auto d-flex justify-content-center">		
					<p class="alert alert-success display-4">For new applicants! Please choose your role!</p> 
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="col-12 col-md-4 my-3">
					<a href="<?=$appTch_url?>" class="btn btn-secondary choice_button">I am a teacher</a>
				</div>
				<div class="col-12 col-md-4 my-3">
					<a href="<?=$appStd_url?>" class="btn btn-secondary choice_button">I am a student</a>
				</div>
			</div>
		</div>
	</section>
	<?php require_once($footer_ldp); ?>
</body>
</html>
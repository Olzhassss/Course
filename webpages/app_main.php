<!-- NOTES:
	THE NAMES OF VARIABLES USED
	> HEADER FILE ADDRESS - $header_uri
	> FOOTER FILE ADDRESS - $footer_uri
	> HEAD TAG FILE ADDRESS - $head_uri
	> STUDENTS APPLICATION PAGE HREF - $app_std0
	> TEACHERS APPLICATION FORM HREF - $app_tch
	> CUSTOM STYLESHEETS ARRAY (files' names) - $custom_stylesheets
    > CUSTOM STYLES (CSS) - $custom_styles
	> PAGE TITLE (string) - $title
	> 'ROOT' FILE ADDRESS - "../root.php" ($root_uri)
	> ROOT DIRECTORY PREFIX - $temp
-->

<?php
	//session_start();
	$temp = "..";
	include_once('../root.php');
	$title = 'AppleTree main page';
	$custom_stylesheets = array("header.style.css", "footer.style.css", "app_main.style.css");
	$custom_styles = ".choice_button{ width: 100%; padding-top: 20px; padding-bottom: 20px;	font-size: 2rem; }";
?>

<!DOCTYPE html>
<html>
	<?php include_once($head_uri); ?>
<body>
 	<?php include_once($header_uri); ?>
	<section id="section-main">
		<div class="container py-5 my-3">	
			<div class="row">
					<!-- Creating and filling teacher application form -->
				<div class="col-auto d-flex justify-content-center">		
					<p class="alert alert-success display-4">For new applicants! Please choose your role!</p> 
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="col-12 col-md-4 my-3">
					<a href="<?=$app_tch;?>" class="btn btn-secondary choice_button">I am a teacher</a>
				</div>
				<div class="col-12 col-md-4 my-3">
					<a href="<?=$app_std0;?>" class="btn btn-secondary choice_button">I am a student</a>
				</div>
			</div>
		</div>
	</section>
	<?php include_once($footer_uri); ?>
</body>
</html>

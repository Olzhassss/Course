<!-- NOTES:
	THE NAMES OF VARIABLES USED
	> 'BACK' LINK HREF - $back_link
	> HEAD TAG FILE ADDRESS - $head_uri
	> PRIVATE LESSONS APPLICATION PAGE HREF - $app_std_private
	> GROUP LESSONS APPLICATION PAGE HREF - $app_std_group
	> CUSTOM STYLESHEETS ARRAY (files' names) - $custom_stylesheets
    > CUSTOM STYLES (CSS) - $custom_styles
	> PAGE TITLE (string) - $title
	> 'ROOT' FILE ADDRESS - "../root.php" ($root_uri)
	> ROOT DIRECTORY PREFIX - $temp
-->

<?php
	$temp = "..";
	include_once('../root.php'); 
	$custom_styles = " .choice_button{ width: 100%; font-size: 2rem;}";
	$custom_stylesheets = array("back-link.style.css");
?>

<!-- BEGINNING OF HTML -->
<!DOCTYPE html>
<html lang="en">
	<?php include_once($head_uri); ?>
<body>
	<a class="nav-link" href="<?=$back_link;?>" id="back-link"><-Back</a>

	<br></br>
	<div class="mt-5">
		<!-- Creating and filling teacher application form -->
		<form method="post" action="">
			<div class="container">
				<div class="row mb-2">
					<p class="alert display-4">For new student applicants!</p>
				</div>
				<form method="post" action="?" style="height: 200px;">
					<P class="alert alert-success display-4">Please choose would you like to have group or private lessons</p> 
					<div class="row mb-3">
						<div class="col-md"></div>
						<div class="col-12 col-sm-6 col-md-4 mb-3">
							<a href="<?=$app_std_group;?>" class="btn btn-secondary py-4 choice_button">Group lessons</a>
						</div>
						<div class="col-12 col-sm-6 col-md-4 mb-3">
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
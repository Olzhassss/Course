<!-- BEGINNING OF THE FILE, PHP -->
<?php
//Importing necessary file of connection to the database
include_once('connect.php');

// Form processing, this inserts applied teacher's data into 'teachers' table inside the database
// and returns alert depending on result of SQL query;
// redirects to the main page if successful
if(isset($_POST["submit_button_teacher"]))
{
	echo "<script>window.location = 'http://sau2/app_t.php'</script>";

}
else if(isset($_POST["submit_button_student"]))
{
	echo "<script>window.location = 'http://sau2/app_s.php'</script>";
}
// Importing the header with custom page title
$title = 'Application page 1';
include_once('header.php');
?>
<!-- END OF PHP -->
<!-- BEGINNING OF HTML -->
<head>
	<!--importing styles from foreign file-->
	<link rel="stylesheet" href="stylesheets/application.style.css">
</head>

<div class="container main" >

	<div class="form-wrapper pl-3 pt-3 pb-3 pr-3">
		<!-- Creating and filling teacher application form -->
		<form method="post" action="?" style="height: 200px;">
			<h2>For new applicants! Please choose your role!</h2> 
			<input type="submit" name="submit_button_teacher" value="I am a teacher" class="mt-3 ml-1 mr-1" style="width:30%; height: 15%;" disabled="True">
			<input type="submit" name="submit_button_student" value="I am a student" class="mt-3 ml-1 mr-1" style="width:30%;height: 15%;"  disabled="True">
			<br>
 		</form>
 	</div>
</div>
<!-- Including footer -->
<?php include_once('footer.php');?> 
<!-- END OF FILE -->
<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	
	require_once $connection_config;
	session_start();

	if (!isset($_SESSION['user_login'])) {
		header('Location:sign_in.php');
	}

	$title = 'Schedule';
	//$customStylesheets_array = array("headerAdmin.style.css");
	// Storing all necessary files in arrays for further import
	$customStylesheets_array = array("headerAdmin.style.css", "loader.style.css");
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once($head_pathname); ?>
<body>
 	<?php require_once($headerAdmin_pathname); ?>
	
	<div class="container">
		<section id="section-monday">
			<h3>Monday</h3>
			<table class="table table-bordered">
				<thead class="thead-light">
					<tr>
				        <th scope="col">#</td>
				        <th scope="col">Teacher</th>
				        <th scope="col">Room</th>
				        <th scope="col">Number of students</th>
				    </tr>
				</thead>
				<tbody>
					<tr>
				        <th scope="row">session_timeline</th>
				        <td>name (select lessons.room lessons.std_num teachers.name teachers.surname from lessons inner join teachers on lessons.id_teacher = teachers.id)</td>
				        <td>rooms</td>
				        <td>std_num</td>
				    </tr>
				</tbody>
			</table>
		</section>
		
	</div>
	

</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php/*
foreach ($custom_scripts as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }*/
?>

</html>
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
	$customScripts_array = array("loader.js");
	$spinner_src = $imgs . "spinner.gif";
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once($head_pathname); ?>
<body>
 	<?php require_once($headerAdmin_pathname); ?>

	<!-- The loader -->
	<div id="loader_div" class="loader">
		<img src="<?=$spinner_src?>" alt="spinner">
	</div>

	<div class="container">
		<section id="section-monday">
			<h3>Monday</h3>
			<table class="table table-bordered">
				<thead class="thead-light">
					<tr>
				        <th scope="col">Session\Room</td>
				        <th scope="col">101A</th>
				        <th scope="col">101B</th>
				        <th scope="col">102</th>
				    </tr>
				</thead>
				<tbody>
					<?php 
					// Taking information about sessions from database
					$sql = "SELECT `session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM appletree_schedule.monday WHERE `id` = 0";
					$stmt = $pdo->query($sql);
					$head = $stmt->fetch(PDO::FETCH_NUM);


					foreach ($head as $value):
					 ?>
					<tr>
						<th scope="row"><?=$value?></th>
				        <td></td>
				        <td></td>
				        <td></td>
				    </tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			
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
						<th scope="row" rowspan="2">session_timeline</th>
				        <td>name (select lessons.room lessons.std_num teachers.name teachers.surname from lessons inner join teachers on lessons.id_teacher = teachers.id)</td>
				        <td>rooms</td>
				        <td>std_num</td>
				    </tr>
				    <tr>
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
<script>
	$(document).ready(function(){
		fix_loader("loader_div");
	})
</script>
<?php
foreach ($customScripts_array as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>

</html>
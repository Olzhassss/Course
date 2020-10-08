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

	// Taking information about sessions from database
	$sql = "SELECT `session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM appletree_schedule.monday WHERE `id` = 0";
	$stmt = $pdo->query($sql);
	$sessionColumn = $stmt->fetch(PDO::FETCH_NUM);

	$sql = "SELECT `room`,`session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM appletree_schedule.monday WHERE NOT `id` = 0";
	$stmt = $pdo->query($sql);
	$sessionRows = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
				        <?php foreach ($sessionRows as $val):
				        	echo "<th scope=\"col\">". $val['room']. "</th>";
				    	endforeach;?>
				    </tr>
				</thead>
				<tbody>
				<?php foreach ($sessionColumn as $key=>$value): ?>
					<tr class="tr tr-<?=$key?>">
						<th scope="row"><?=$value?></th>
				        <?php
				        foreach ($sessionRows as $val):
				        	$session = "session". ($key+1);
				        	echo "<td>$val[$session]</td>";
				        endforeach;?>
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
		$('tr')
	})
</script>
<?php
foreach ($customScripts_array as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>

</html>
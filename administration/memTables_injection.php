<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	// Terminate if required argument is not passed
	if (!isset($_POST['role'])) {
		exit("False");
	}
	if ($_POST['role'] == "teachers") {
		$sql1 = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'teachers' AND `table_schema` = 'appletree_personnel' AND
		(`column_name` = 'name' OR `column_name` = 'surname' OR `column_name` = 'gender' OR `column_name` = 'email' OR `column_name` = 'set_date') ORDER BY `ORDINAL_POSITION`";
		$sql2 = "SELECT `id`, `name`, `surname`, `gender`, `email`, `set_date` FROM appletree_personnel.teachers";
	}
	
	elseif ($_POST['role'] == "students") {
		$sql1 = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'students' AND `table_schema` = 'appletree_personnel' AND
		(`column_name` = 'name' OR `column_name` = 'surname' OR `column_name` = 'gender' OR `column_name` = 'email' OR `column_name` = 'set_date') ORDER BY `ORDINAL_POSITION`";
		$sql2 = "SELECT `id`, `name`, `surname`, `gender`, `email`, `set_date` FROM appletree_personnel.students";
	}
	// Terminate if the argument has incorrect value
	else { exit("False"); }
	
	$stmt1 = $pdo->query($sql1);
	$stmt2 = $pdo->query($sql2);
?>

	<table class="table table-bordered schedule-table">
		<!-- Table head -->
		<thead class="thead-light">
			<tr>
		        <th scope="col">#</th>
		        <?php
		        //------------------- Filling the column names with the descriptions of the fields
		        while ($result = $stmt1->fetch(PDO::FETCH_NUM)) {
		        	echo "<th scope='col'>". $result[0] . "</th>";	
		        }
		    	?>
		    	<th scope="col">#</th>
		    </tr>
		</thead>
		<!-- Table rows -->
		<tbody>
			<?php 	//------------------- Filling the table
			$i = 0;
			while($result = $stmt2->fetch(PDO::FETCH_NUM)):
			$i++;
			?>
		
				<tr>
					<?php
						foreach ($result as $key => $value) {
							// For the first column
							if ($key == 0) {
								$id = $value;
								echo "<td class='p-0'><a class='btn btn-secondary rounded-0' data-ref-id=\"$value\" href=\"$index_url\">$i</a></td>";
							} else{
								echo "<td>$value</td>";	
							}
						}
					?>		
		
					<td>
						<button class="btn btn-primary btn-browse" onclick="insertCV('<?=$id?>','<?=$_POST['role']?>', '<?=$memCvInject_url?>')"><img src="" alt="Brw"></button>
						<button class="btn btn-primary btn-browse" onclick="memEdt('<?=$id?>', '<?=$_POST['role']?>')"><img src="" alt="Edt"></button>
						<button class="btn btn-primary btn-browse" onclick="memDel('<?=$id?>', '<?=$_POST['role']?>')"><img src="" alt="Del"></button>
					</td>
				</tr>
	
			<?php endwhile; ?>
		</tbody>
	</table>
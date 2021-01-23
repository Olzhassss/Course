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

	// Variate sql queries depending on the role
	if ($_POST['role'] == "teachers") {
		$sql1 = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'teachers' AND `table_schema` = 'appletree_personnel' AND
		(`column_name` = 'name' OR `column_name` = 'surname' OR `column_name` = 'sex' OR `column_name` = 'email' OR `column_name` = 'set_date') ORDER BY `ORDINAL_POSITION`";
		$sql2 = "SELECT `id`, `name`, `surname`, `sex`, `email`, `set_date` FROM `appletree_personnel`.`teachers`";
	} elseif ($_POST['role'] == "students") {
		$sql1 = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'students' AND `table_schema` = 'appletree_personnel' AND
		(`column_name` = 'name' OR `column_name` = 'surname' OR `column_name` = 'sex' OR `column_name` = 'email' OR `column_name` = 'set_date') ORDER BY `ORDINAL_POSITION`";
		$sql2 = "SELECT `id`, `name`, `surname`, `sex`, `email`, `set_date` FROM `appletree_personnel`.`students`";
	}
	// Terminate if the argument has an incorrect value
	else { exit("False"); }
	
	// Field descriptions
	$stmt1 = $pdo->query($sql1);
	// The person's data
	$stmt2 = $pdo->query($sql2);
?>

	<table class="table table-bordered schedule-table">
		<!-- Table head -->
		<thead class="thead-light">
			<tr>
		        <th scope="col">#</th>
		        <?php
		        //------------------- Filling the column names with the descriptions of the fields
		        while ($descriptions_array = $stmt1->fetch(PDO::FETCH_NUM)) {
		        	echo '<th scope=\'col\'>'. $descriptions_array[0] . '</th>';	
		        }
		    	?>
		    	<th scope="col">#</th>
		    </tr>
		</thead>
		<!-- Table rows -->
		<tbody>
			<?php 	//------------------- Filling the table
			$i = 0;
			while($memberData_array = $stmt2->fetch(PDO::FETCH_NUM)):
			$i++;
			?>
		
				<tr>
					<?php
						$id = $memberData_array[0];
						echo '<td class=\'p-0\'><button class=\'btn btn-secondary rounded-0\' onclick=\'insertCV("'.$id.'","'.$_POST['role'].'", "'.$memCvInject_url.'")\'>'.$i.'</button></td>';
						unset($memberData_array[0]);
						foreach ($memberData_array as $value) {
							echo '<td>'.$value.'</td>';
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
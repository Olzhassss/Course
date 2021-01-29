<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	// Terminate if required argument is not passed
	if (!isset($_POST['tableName'])) {
		exit("False");
	}
	// Taking the information about time sessions from the corresponding table in the database to fill schedule table on the webpage later
	// $sql = "SELECT `session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM `appletree_schedule`.`$weekDay_lowered` WHERE `id` = 0";
	// $stmt = $pdo->query($sql);
	// // One day's (webpage) table's first row's records (id = 0)
	// $sessionColumn = $stmt->fetch(PDO::FETCH_NUM);

	// $sql = "SELECT `room`,`session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM `appletree_schedule`.`$weekDay_lowered` WHERE NOT `id` = 0";
	// $stmt = $pdo->query($sql);
	// // The day's (webpage) table's other row's records (with class code) as an array of arrays
	// $sessionRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
	<label for="overlay-table"><?=$day?></label>
	<!--<table id="overlay-table" class="table table-bordered schedule-table">
		<thead class="thead-light">
			<tr>
		        <th scope="col">#</th>
		        <?php
		        //------------------- Filling the column names with the descriptions of the fields
		        // while ($descriptions_array = $stmt1->fetch(PDO::FETCH_NUM)) {
		        // 	echo "<th scope='col'>". $descriptions_array[0] . "</th>";	
		        // }
		    	?>
		    	<th scope="col">#</th>
		    </tr>
		</thead>
		<tbody>
			<?php 	//------------------- Filling the table
			/*$i = 0;
			while($applicantData_array = $stmt2->fetch(PDO::FETCH_NUM)):
			$i++;
			?>
		
				<tr>
					<?php
						$id = $applicantData_array[0];
						echo '<td class=\'p-0\'><button class=\'btn btn-secondary rounded-0\' onclick=\'insertCV("'.$id.'","'.$_POST['role'].'", "'.$appCvInject_url.'")\'>'.$i.'</button></td>';
						unset($applicantData_array[0]);
						foreach ($applicantData_array as $value) {
							echo '<td>'.$value.'</td>';
						}
					?>		
		
					<td>
						<button class="btn btn-primary btn-browse" onclick="insertCV('<?=$id?>','<?=$_POST['role']?>', '<?=$appCvInject_url?>')"><img src="" alt="Brw"></button>
						<button class="btn btn-primary btn-browse" onclick="appAdd('<?=$id?>', '<?=$_POST['role']?>')"><img src="" alt="Add"></button>
						<button class="btn btn-primary btn-browse" onclick="appDel('<?=$id?>', '<?=$_POST['role']?>')"><img src="" alt="Del"></button>
					</td>
				</tr>
	
			<?php endwhile; */?>
		</tbody>-->
	</table>
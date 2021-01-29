<?php
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	// Terminate if required argument is not passed
	if (!isset($_POST['day'])) {
		exit("False");
	}

	$tableName = strtolower($_POST['day']);

	try {
		// Taking the information about time sessions from the corresponding table in the database to fill schedule table on the webpage later
		$sql = "SELECT `session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM `appletree_schedule`.`$tableName` WHERE `id` = 0";
		$stmt = $pdo->query($sql);
		// One day's (webpage) table's first row's records (id = 0)
		$sessionColumn = $stmt->fetch(PDO::FETCH_NUM);

		$sql = "SELECT `room`,`session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM `appletree_schedule`.`$tableName` WHERE NOT `id` = 0";
		$stmt = $pdo->query($sql);
		// The day's (webpage) table's other row's records (with class code) as an array of arrays
		$sessionRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Getting information about class teachers from the database
		$sql = "SELECT `classes`.`id`, `teachers`.`name`, `teachers`.`surname`, `classes`.`std_num` FROM `appletree_personnel`.`classes` INNER JOIN `appletree_personnel`.`teachers` ON `classes`.`id_teacher` = `teachers`.`id`";
		$stmt= $pdo->query($sql);
		// Creating and filling an associative array (key = DB table's id column value, class code in other words)
		// to have a two-dimensional array and alleviate further processing
		$classesAssoc = array();
		while ($classes = $stmt->fetch()) {
			$classesAssoc[$classes["id"]] = array('name' => $classes["name"], 'surname' => $classes["surname"], 'std_num' => $classes["std_num"]);
		}
	} catch (Exception $e) {
		exit ('Error occured during execution. Please, try again.');
	}
	?>

	<h1 class='font-weight-light mx-2 pt-4'><?=$_POST['day']?></h1>
	<form id='form' data-day="<?=$tableName?>" data-col-number="<?=count($sessionRow)-1?>" style="overflow-x: auto;">
		<table class="table table-bordered schedule-table">
			<!-- Table head -->
			<thead class="thead-light">
				<tr>
					<th scope="col">Session\Room</td>
					<?php
					// Fetch room numbers
					// $sql = "SELECT `room` FROM `appletree_schedule`.`$tableName` WHERE NOT `id` = 0";
					// $stmt = $pdo->query($sql);
					// $sessionColumn = $stmt->fetch(PDO::FETCH_NUM);
					// Filling the first row with auditory numbers
					foreach ($sessionRow as $recordData):
						echo "<th scope='col'>Room ". $recordData['room']. "</th>";
					endforeach;?>
			    </tr>
			</thead>
			<!-- Table rows -->
			<tbody>
			<?php
			// Filling first record of every row with lesson time
			foreach ($sessionColumn as $key=>$lessonTime): ?>
				<tr class="tr tr-<?=$key?>">
					<th scope="col"><?=$lessonTime?></th>

					<?php
					// Filling next records of the current rows with class codes
					foreach ($sessionRow as $key1 => $recordData):
						// The variable used to access the field (in DB) corresponting to the row of the webpage table
						$sessionNumber = "session". ($key+1);
						
						if (isset($recordData[$sessionNumber])):
							$fullData = $recordData[$sessionNumber];
							// If a class with the given name (ID) was found in the classes table
							if (isset($classesAssoc[$recordData[$sessionNumber]])) {
								$fullData .= ', ' . $classesAssoc[$recordData[$sessionNumber]]['name'] . ' ' . $classesAssoc[$recordData[$sessionNumber]]['surname'] . ', ' . $classesAssoc[$recordData[$sessionNumber]]['std_num'] . ' student(s)';
							}?>
							<td class="p-0">
								<div class="d-block w-100 h-100">
								<button type="button" class="border-0 table-button d-flex align-items-stretch"><?= $fullData ?></button>
								<input type="hidden" class="column-<?=$key1?>" name="<?=$sessionNumber?>" value="<?=$recordData[$sessionNumber]?>">
								</div>
							</td>
						<?php
						else:
							echo '<td><i style="color: rgb(168, 168, 168); pointer-events: none;">EMPTY</i></td>';
						endif;
					endforeach;?>
					
			    </tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</form>
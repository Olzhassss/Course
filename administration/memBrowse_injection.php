<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	// Terminate if the required arguments are not passed
	if (!isset($_POST['id']) || !isset($_POST['role'])) {
		exit('False');
	}

	// Variate sql queries / PDO statements depending on the role
	if ($_POST['role'] == 'teachers') {
		$sql1 = 'SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = "teachers" AND `table_schema` = "appletree_personnel" ORDER BY `ORDINAL_POSITION`';
		$stmt2 = $pdo->prepare('SELECT * FROM `appletree_personnel`.`teachers` WHERE `id` = :id');
		
	}
	elseif ($_POST['role'] == 'students') {
		$sql1 = 'SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = "students" AND `table_schema` = "appletree_personnel" ORDER BY `ORDINAL_POSITION`';
		$stmt2 = $pdo->prepare('SELECT * FROM `appletree_personnel`.`students` WHERE `id` = :id');
	}
	// Terminate if the argument has an incorrect value
	else { exit('False'); }

	// Fetch column descriptions into an array
	$stmt1 = $pdo->query($sql1);
	$descriptions_array = $stmt1->fetchAll(PDO::FETCH_COLUMN);
	
	// Fetch particular record's data
	$stmt2->execute([':id' => $_POST['id']]);
	$data_array = $stmt2->fetch(PDO::FETCH_BOTH);
?>
	<head>
		<?php
		if (!empty($customStylesheets_array))
		    foreach ($customStylesheets_array as $value) { echo "<link rel='stylesheet' href=$css$value>".PHP_EOL; }
		if (!empty($customStyles_css)) { echo "<style> $customStyles_css </style>".PHP_EOL; }
		?>
	</head>

	<h1 class="my-3"><?=$data_array['name'].' '.$data_array['surname'].' ('.$data_array['id'].')'?></h1>
	<div class="w-75 d-flex justify-content-between">
		<button class="btn btn-success w-50 mx-4" onclick="memEdt(<?=$_POST['id']?>, '<?=$_POST['role']?>')">Edit</button>
		<button class="btn btn-warning w-50 mx-4" onclick="memDel(<?=$_POST['id']?>, '<?=$_POST['role']?>')">Delete</button>
	</div>
	
	<div class="mt-3">
		<table class="table table-bordered">
			<!-- Table rows -->
			<?php foreach ($descriptions_array as $key => $value ):?>

			    <tr>
			    	<th scope='col' width="40%" ><?=$value?></th>
			    	<td><?=($data_array[$key]=='')?'<i class="text-muted">None</i>':$data_array[$key]?></td>
			    </tr>
				
			<?php endforeach;?>
		</table>

		<?php if ($_POST['role'] == 'teachers'): // Displaying information about teacher's classes
			// Classes table's fields' descriptions
			$sql = 'SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = "classes" AND `table_schema` = "appletree_personnel" ORDER BY `ORDINAL_POSITION`';
			$stmt1 = $pdo->query($sql);

			// The classes's data
			$stmt2 = $pdo->prepare('SELECT * FROM `appletree_personnel`.`classes` WHERE `id_teacher` = :id');
			$stmt2->execute([':id' => $_POST['id']]);?>

		<h2 class="mb-3 mt-5">List of classes</h2>
		<table class="table table-bordered">
			<thead class="thead-light">
				<tr>
			        <th scope="col">#</th>
			        <?php
			        //------------------- Filling the column names with the descriptions of the fields
			        $descriptions_array = $stmt1->fetchAll(PDO::FETCH_COLUMN);
			        // Unset the useless teacher id from the descriptions
			        unset($descriptions_array[3]);
			        foreach ($descriptions_array as $value) {
			        	echo '<th scope="col">'. $value . '</th>';	
			        }
			    	?>
			    </tr>
			</thead>
			<!-- Table rows -->
			<tbody>
				<?php 	//------------------- Filling the table
				$i = 0;
				while($classData_array = $stmt2->fetch(PDO::FETCH_NUM)):
				$i++;
				?>
			
					<tr>
						<?php
							echo '<td>'.$i.'</td>';
							// Unset the useless teacher id from the data
							unset($classData_array[3]);
							foreach ($classData_array as $value) {
								if (!is_null($value))
									echo '<td>'.$value.'</td>';
								else
									echo '<td><i class="text-muted">None</i></td>';								
							}
						?>
					</tr>
			
				<?php endwhile;
				// If the loop exited immediately
				if ($i == 0)
					echo "<tr><td class='text-muted'>No classes</td></tr>".PHP_EOL;
				?>
			</tbody>
		</table>

		<?php endif; ?>
	</div>


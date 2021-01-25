<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}

	// Fetch descriptions
	//$sql = "SELECT `column_comment`,`column_name` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'students' AND `table_schema` = 'appletree_general' ORDER BY `ORDINAL_POSITION`";
	//$stmt = $pdo->query($sql);
	//$columnsData_array = $stmt->fetchAll();
?>

<head>
		<?php
		if (!empty($customStylesheets_array))
		{
		    foreach ($customStylesheets_array as $value) { echo "<link rel='stylesheet' href=$css$value>".PHP_EOL; }
		}
		if (!empty($customStyles_css)) { echo "<style> $customStyles_css </style>".PHP_EOL; }
		?>
	</head>
	<div class="container">
		<nav class="btn-group my-4 w-50">
			<button class="px-5 btn btn-success py-3" onclick="txtUpd('<?=$appTables_url?>')">Save changes</button>
		</nav>

		<form id="form">
			<table class="table table-bordered">
				<?php // Fetch short texts
				$stmt = $pdo->query("SELECT * FROM `appletree_general`.`short_texts`");
				while ($record = $stmt->fetch()):?>
					<tr>
						<th scope='col' width="40%" ><?=$record["description"]?></th>
						<td>
							<textarea rows="2" type="text" name="<?=$record["id"]?>" class="form-control"><?=$record["text"]?></textarea>
						</td>
					</tr>
				<?php endwhile; ?>
				<?php // Fetch social media data
				$stmt = $pdo->query("SELECT * FROM `appletree_general`.`social_media`");
				while ($record = $stmt->fetch()):?>
					<tr>
						<th scope='col' width="40%" ><?=$record["description"]?></th>
						<td>
							<textarea rows="2" type="text" name="<?=$record["id"]?>" class="form-control"><?=$record["href"]?></textarea>
						</td>
					</tr>
				<?php endwhile; ?>
				<!--
				
				<?php
				$i = 2;
				while ( $i < 4):?>
					<tr>
						<th scope='col' width="40%" ><?=$columnsData_array[$i]["column_comment"]?></th>
						<td>
							<input type="text" class="form-control" name="<?=$columnsData_array[$i]["column_name"]?>" required="true" value="<?=$recordData_array[$i]?>">
						</td>
					</tr>
				<?php $i++; endwhile;?>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[4]["column_comment"]?></th>
					<td>
						<select class="form-control" name="<?=$columnsData_array[4]["column_name"]?>">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>	
					</td>
				</tr>
				<?php
				$i = 5;
				while ( $i < 8):?>
					<tr>
						<th scope='col' width="40%" ><?=$columnsData_array[$i]["column_comment"]?></th>
						<td>
							<input type="text" class="form-control" name="<?=$columnsData_array[$i]["column_name"]?>" required="true" value="<?=$recordData_array[$i]?>">
						</td>
					</tr>
				<?php $i++; endwhile;?>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[8]["column_comment"]?></th>
					<td>
						<select class="form-control" name="<?=$columnsData_array[8]["column_name"]?>">
							<option value="1">Group</option>
							<option value="0">Private</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[9]["column_comment"]?></th>
					<td>
						<select class="form-control" name="<?=$columnsData_array[9]["column_name"]?>">
							<option value="Undetermined">Undetermined</option>
							<option value="Elementary">Elementary</option>
							<option value="Pre-Intermediate">Pre-Intermediate</option>
							<option value="Upper-intermediate">Upper-intermediate</option>
							<option value="Intermediate">Intermediate</option>
							<option value="Advanced">Advanced</option>
						</select>	
					</td>
				</tr>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[11]["column_comment"]?></th>
					<td>
						<select class="form-control" name="<?=$columnsData_array[11]["column_name"]?>" >
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[10]["column_comment"]?></th>
					<td>
						<input type="text" disabled="true" class="form-control" value="<?=$recordData_array[10]?>">
						<input type="hidden" name="<?=$columnsData_array[10]["column_name"]?>" required="true" value="<?=$recordData_array[10]?>">
					</td>
				</tr>-->

				<?php /* foreach ($columnsData_array as $key => $value ):?>

				    <tr>
				    	<th scope='col' width="40%" ><?=$value["column_comment"]?></th>
				    	<td>
				    		<input type="text" class="form-control" name="<?=$value["column_name"]?>" required="true" value="<?=$recordData_array[$key]?>">
				    	</td>
				    </tr>
					
				<?php endforeach; */ ?>
			</table>
		</form>
	</div>

<script>
	// The script selects actual values for 'select' fields
	$(document).ready(function(){
		
	});
</script>
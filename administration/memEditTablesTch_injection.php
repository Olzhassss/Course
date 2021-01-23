<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	// Terminate if required argument is not passed
	if (!isset($_POST['id'])) {
		exit("False");
	}

	// Fetch descriptions
	$sql = "SELECT `column_comment`,`column_name` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'teachers' AND `table_schema` = 'appletree_personnel' ORDER BY `ORDINAL_POSITION`";
	$stmt = $pdo->query($sql);
	$columnData_array = $stmt->fetchAll();

	// Fetch particular record's data
	$stmt = $pdo->prepare("SELECT * FROM `appletree_personnel`.`teachers` WHERE `id` = :id");
	$stmt->execute([':id' => $_POST['id']]);
	$recordData_array = $stmt->fetch(PDO::FETCH_NUM);
?>

<table class="table table-bordered">
	<tr>
    	<th scope='col' width="40%" ><?=$columnData_array[0]["column_comment"]?></th>
    	<td>
    		<input type="text" disabled="true" class="form-control" value="<?=$recordData_array[0]?>">
    		<input type="hidden" name="<?=$columnData_array[0]["column_name"]?>" required="true" value="<?=$recordData_array[0]?>">
    	</td>
    </tr>
	<?php
	$i = 1;
	while ( $i < 3):?>
		<tr>
			<th scope='col' width="40%" ><?=$columnData_array[$i]["column_comment"]?></th>
			<td>
				<input type="text" class="form-control" name="<?=$columnData_array[$i]["column_name"]?>" required="true" value="<?=$recordData_array[$i]?>">
			</td>
		</tr>
	<?php $i++; endwhile;?>
	<tr>
		<th scope='col' width="40%" ><?=$columnData_array[3]["column_comment"]?></th>
		<td>
			<select class="form-control" name="<?=$columnData_array[3]["column_name"]?>">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Other">Other</option>
			</select>	
		</td>
	</tr>
	<?php
	$i = 4;
	while ( $i < 8):?>
		<tr>
			<th scope='col' width="40%" ><?=$columnData_array[$i]["column_comment"]?></th>
			<td>
				<input type="text" class="form-control" name="<?=$columnData_array[$i]["column_name"]?>" required="true" value="<?=$recordData_array[$i]?>">
			</td>
		</tr>
	<?php $i++; endwhile;?>
	<tr>
		<th scope='col' width="40%" ><?=$columnData_array[8]["column_comment"]?></th>
		<td>
			<select class="form-control" name="<?=$columnData_array[8]["column_name"]?>">
				<option value="Undetermined">Undetermined</option>
				<option value="Any">Any</option>
				<option value="Elementary">Elementary</option>
				<option value="Pre-Intermediate">Pre-Intermediate</option>
				<option value="Upper-intermediate">Upper-intermediate</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Advanced">Advanced</option>
			</select>	
		</td>
	</tr>
	<?php
	$i = 10;
	while ( $i < 13):?>
		<tr>
			<th scope='col' width="40%" ><?=$columnData_array[$i]["column_comment"]?></th>
			<td>
				<select class="form-control" name="<?=$columnData_array[$i]["column_name"]?>" >
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select>
			</td>
		</tr>
	<?php $i++; endwhile;?>
	<tr>
		<th scope='col' width="40%" ><?=$columnData_array[9]["column_comment"]?></th>
		<td>
			<input type="text" disabled="true" class="form-control" value="<?=$recordData_array[9]?>">
			<input type="hidden" name="<?=$columnData_array[9]["column_name"]?>" required="true" value="<?=$recordData_array[9]?>">
		</td>
	</tr>

	<?php /* foreach ($columnData_array as $key => $value ):?>

	    <tr>
	    	<th scope='col' width="40%" ><?=$value["column_comment"]?></th>
	    	<td>
	    		<input type="text" class="form-control" name="<?=$value["column_name"]?>" required="true" value="<?=$recordData_array[$key]?>">
	    	</td>
	    </tr>
		
	<?php endforeach; */ ?>
</table>
<script>
	// The script selects actual values for 'select' fields
	$(document).ready(function(){
		$('select[name=<?=$columnData_array[3]["column_name"]?>]').val("<?=$recordData_array[3]?>");
		$('select[name=<?=$columnData_array[8]["column_name"]?>]').val("<?=$recordData_array[8]?>");
		<?php 
		for($i= 10; $i<13; $i++)
			echo '$(\'select[name='.$columnData_array[$i]['column_name'].']\').val("'.$recordData_array[$i].'");';
		?>
		
	});
</script>
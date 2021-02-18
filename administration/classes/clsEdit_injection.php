<?php 
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	// Terminate if the required argument is not passed
	if (!isset($_POST['id'])) {
		exit('False');
	}

	// Fetch columns' despcriptions and names
	$sql = 'SELECT `column_comment`, `column_name` FROM `information_schema`.`COLUMNS` WHERE `table_name` = "classes" AND `table_schema` = "appletree_personnel" ORDER BY `ORDINAL_POSITION`';
	$stmt = $pdo->query($sql);
	$columnsData_array = $stmt->fetchAll();

	if ($_POST['id'] != '') {
		// Fetch particular record's data
		$stmt = $pdo->prepare('SELECT * FROM `appletree_personnel`.`classes` WHERE `id` = :id');
		$stmt->execute([':id' => $_POST['id']]);
		$classData_array = $stmt->fetch(PDO::FETCH_BOTH);
	}
?>
	<head>
		<?php
		if (!empty($customStylesheets_array))
		    foreach ($customStylesheets_array as $value) { echo "<link rel='stylesheet' href=$css$value>".PHP_EOL; }
		if (!empty($customStyles_css)) { echo "<style> $customStyles_css </style>".PHP_EOL; }
		?>
	</head>

	<h1 class="mb-3 mt-5"><?=$_POST['id']?></h1>
	<div class="w-75 d-flex justify-content-between">
		<button class="btn btn-success w-50 mx-4" onclick="clsUpd('<?=$_POST['id']?>','update')">Save</button>
		<button id="button-delete" class="btn btn-warning w-50 mx-4" onclick="clsDel('<?=$_POST['id']?>')">Delete</button>
	</div>

	<form class="mt-3" id="form">
		<table class="table table-bordered">
			<!-- Table rows -->
			<tr>
				<th scope='col' width="40%" ><?=$columnsData_array[0]["column_comment"]?></th>
			    <td>
			    	<input type="text" style="width: 48%;" class="d-inline-block form-control" value="<?=substr($_POST['id'],0,3)?>" disabled="true">
			    	<span> - </span>
			    	<input type="text" maxlength="9" style="width: 48%;" class="d-inline-block form-control" name="class_number" required="true" value="<?=substr($_POST['id'],strpos($_POST['id'], '-')+1)?>">
			    </td>
			</tr>
			<tr>
				<th scope='col' width="40%" ><?=$columnsData_array[1]["column_comment"]?></th>
			    <td>
			    	<input type="text" class="form-control" maxlength="100" name="<?=$columnsData_array[1]["column_name"]?>" required="true" value="<?=$classData_array[$columnsData_array[1]["column_name"]]?>">
			    </td>
			</tr>
			<tr>
				<th scope='col' width="40%" >Class category</th>
			    <td>
			    	<select class="form-control" name="group_ls">
						<option value="PR">Private</option>
						<option value="GR">Group</option>
						<option value="SP">Special</option>
					</select>	
			    </td>
			</tr>
			<tr>
				<th scope='col' width="40%" ><?=$columnsData_array[4]["column_comment"]?></th>
				<td>
					<select class="form-control" name="<?=$columnsData_array[4]["column_name"]?>">
						<option value="Mixed">Mixed</option>
						<option value="Beginner">Beginner</option>
						<option value="Elementary">Elementary</option>
						<option value="Pre-Intermediate">Pre-Intermediate</option>
						<option value="Upper-intermediate">Upper-intermediate</option>
						<option value="Intermediate">Intermediate</option>
						<option value="Advanced">Advanced</option>
					</select>	
				</td>
			</tr>
			<tr>
				<th scope='col' width="40%" ><?=$columnsData_array[3]["column_comment"]?></th>
				<td>
					<select class="form-control" name="<?=$columnsData_array[3]['column_name']?>">
						<option value="">None</option>
			    		<?php
			    			$stmt = $pdo->query("SELECT `id`, `name`, `surname` FROM `appletree_personnel`.`teachers`");
			    			while ($select_options = $stmt->fetch()):
			    				$sql = "SELECT COUNT(id) FROM `appletree_personnel`.`classes` WHERE `id_teacher` = :id";
			    				$stmt1 = $pdo->prepare($sql);
			    				$stmt1->execute([':id' => $select_options['id']]);
			    				$numberOfClasses = $stmt1->fetch(PDO::FETCH_NUM)[0];
			    		?>
			    			<option value="<?=$select_options['id']?>"><?=$select_options['name'] .' '. $select_options['surname'] .' ('.$numberOfClasses.' class[es])'?></option>
			    		<?php endwhile; ?>
			   		</select>
					
				</td>
			</tr>
			<tr>
				<th scope='col' width="40%" ><?=$columnsData_array[2]["column_comment"]?></th>
				<?php $std_num = (isset($classData_array['std_num']))?$classData_array['std_num']:'0'; ?>
				<td><input type="text" class="form-control" disabled="true" value="<?=$std_num?>"></td>
			</tr>
		</table>
	</form>
<script>
	$(document).ready(function(){
	<?php // Select corresponding values for select if the class is given and disable delete if not
	if ($_POST['id'] != ''): ?>
		$('select[name=<?=$columnsData_array[4]["column_name"]?>]').val("<?=$classData_array[4]?>");
		$('select[name=<?=$columnsData_array[3]["column_name"]?>]').val("<?=$classData_array[3]?>");
		$('select[name=group_ls]').val("<?=substr($_POST['id'],0,2)?>");
	<?php else: ?>
		$('#button-delete').attr('disabled',true);
	<?php endif; ?>
	})

	function clsUpd(arg_id, action) {
		let data = new Object();
		// Fill an object properties with values of every field if a record should be updated
		if (action == 'update'){
			let fields = $('form#form').serializeArray();
			fields.forEach(function(value){ data[value['name']] = value['value']; })
		}
		data['action'] = action;
		data['id'] = arg_id;		
		$.ajax({
			url: "<?= $classProcessing_url ?>",
			type: 'POST',
			cache: false,
			data: data,
			beforeSend: function() {
				$("#loader_div").removeClass("hidden");
			},
			success: function(reply){
				if (reply == 0)
				{
					$("button[data-essence = 'classes']").trigger("click");
				}
				else
				{
					alert(reply);
					return;
				}
			}
		})
		$("#loader_div").addClass("hidden");
		return;
	}
</script>
<?php 
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
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

	// Fetch columns' despcriptions and names
	$sql = "SELECT `column_comment`, `column_name` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'classes' AND `table_schema` = 'appletree_personnel' ORDER BY `ORDINAL_POSITION`";
	$stmt = $pdo->query($sql);
	$columnsData_array = $stmt->fetchAll();

	if ($_POST['id'] != "-1") {
		// Fetch particular record's data
		$stmt = $pdo->prepare("SELECT * FROM `appletree_personnel`.`classes` WHERE `id` = :id");
		$stmt->execute([':id' => $_POST['id']]);
		$classData_array = $stmt->fetch(PDO::FETCH_BOTH);
	}
	

	/*// Fetch the class's teacher's name and surname
	$stmt = $pdo->prepare("SELECT `name`,`surname` FROM `appletree_personnel`.`teachers` WHERE `id` = :id");
	$stmt->execute([':id' => $classData_array['id_teacher']]);
	$teacherData_array = $stmt->fetch();
	$teacher = $teacherData_array['name'] .' '. $teacherData_array['surname'];*/
?>
	<head>
		<?php
		if (!empty($customStylesheets_array))
		{
		    foreach ($customStylesheets_array as $value)
		    {
		        echo "<link rel='stylesheet' href=$css$value>".PHP_EOL;
		    }
		}
		if (!empty($customStyles_css))
		{
		    echo "<style> $customStyles_css </style>".PHP_EOL;
		}
		?>
	</head>

	<h1 class="my-3"><?=$classData_array['id']?></h1>
	<div class="w-75 d-flex justify-content-between">
		<button class="btn btn-success w-50 mx-4" onclick="clsUpd('<?=$_POST['id']?>','update')">Save</button>
		<button id="button-delete" class="btn btn-warning w-50 mx-4" onclick="clsUpd('<?=$_POST['id']?>','delete')">Delete</button>
	</div>

	<form class="mt-3" id="form">
		<table class="table table-bordered">
			<!-- Table rows -->
			<tr>
				<th scope='col' width="40%" ><?=$columnsData_array[0]["column_comment"]?></th>
			    <td>
			    	<input type="text" class="form-control" name="<?=$columnsData_array[0]["column_name"]?>" required="true" value="<?=$classData_array['id']?>"></td>
			    <!--<select class="form-control" name="<?=$columnsData_array[0]['column_name']?>">
			    		<?php 
			    			$stmt = $pdo->query("SELECT `classes`.`id`, `classes`.`std_num`,`teachers`.`name`, `teachers`.`surname` FROM `appletree_personnel`.`classes` INNER JOIN `appletree_personnel`.`teachers` ON `classes`.`id_teacher` = `teachers`.`id`");
			    			while ($select_options = $stmt->fetch()):
			    		?>
			    			<option value="<?=$select_options['id']?>"><?=$select_options['id'] .', '. $select_options['name'] .' '. $select_options['surname'] .' ('.$select_options['std_num'].' student[s])'?></option>
			    		<?php endwhile; ?>
			    		<input type="text" class="form-control" name="<?=$columnsData_array[0]["column_name"]?>" required="true" value="<?=$teacher?>">
			    </select>-->
			</tr>
			<tr>
				<th scope='col' width="40%" ><?=$columnsData_array[3]["column_comment"]?></th>
				<td>
					<select class="form-control" name="<?=$columnsData_array[3]["column_name"]?>">
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
				<th scope='col' width="40%" ><?=$columnsData_array[2]["column_comment"]?></th>
				<td>
					<select class="form-control" name="<?=$columnsData_array[2]['column_name']?>">
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
				<th scope='col' width="40%" ><?=$columnsData_array[1]["column_comment"]?></th>
				<?php $std_num = (isset($classData_array['std_num']))?$classData_array['std_num']:'0'; ?>
				<td><input type="hidden" name="<?=$columnsData_array[1]['column_name']?>" value="<?=$std_num?>"><?=$std_num?></td>
			</tr>
		</table>
		<table>
			<?php?>

				<tr>
					<?php
							echo "<td class='p-0'><a class='btn btn-secondary rounded-0' data-ref-id=\"$value\" href=\"$index_url\">$i</a></td>";
							// echo name, surname + other.
						?>		
			
						<td>
							<button class="btn btn-primary btn-browse" onclick="insertCV('<?=$id?>','<?=$_POST['role']?>', '<?=$memCvInject_url?>')"><img src="" alt="Brw"></button>
							<button class="btn btn-primary btn-browse" onclick="memEdt(<?=$std_array['id']?>, 'students')"><img src="" alt="Edt"></button>
							<button class="btn btn-primary btn-browse" onclick="memDel(<?=$std_array['id']?>, 'students')"><img src="" alt="Del"></button>
						</td>
				</tr>
			<?php?>			
		</table>
	</form>
<script>
	$(document).ready(function(){
		$('select[name=<?=$columnsData_array[3]["column_name"]?>]').val("<?=$classData_array[3]?>");
		$('select[name=<?=$columnsData_array[2]["column_name"]?>]').val("<?=$classData_array[2]?>");
		if ('<?=$_POST['id']?>'=='') { $('#button-delete').attr('disabled',true);}
	})

	function clsUpd(arg_id, action) {
		let data = new Object();
		// Fill an object properties with values of every field if a record should be updated
		if (action == 'update'){
			let fields = $('form#form').serializeArray();
			fields.forEach(function(value){ data[value['name']] = value['value']; })
			data['previous_id'] = arg_id;
		}
		else // In case the record should be deleted
			data['id'] = arg_id;
		data['action'] = action;
		
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
					var result = confirm("Update is successul! Press OK to return to lists.")
					if (result)
						$("button[data-essence = 'classes']").trigger("click");
					return;
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
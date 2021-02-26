<?php 
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}

	$customStylesheets_array = array('tables.style.css');

	// Field descriptions
	$sql = 'SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = "classes" AND `table_schema` = "appletree_personnel" ORDER BY `ORDINAL_POSITION`';
	$stmt1 = $pdo->query($sql);
	// The class's data
	$stmt2 = $pdo->query('SELECT * FROM `appletree_personnel`.`classes`');
?>
	<div id="content" class="container">
		<head>
			<?php
			if (!empty($customStylesheets_array))
			    foreach ($customStylesheets_array as $value) { echo "<link rel='stylesheet' href=$css$value>".PHP_EOL; }
			if (!empty($customStyles_css)) { echo "<style> $customStyles_css </style>".PHP_EOL; }
			?>
		</head>
		<nav class="my-4 w-50">
			<button class="py-3 my-4 btn w-50 btn-success" onclick="clsBrw('<?=$clsEditInject_url?>')">Create a new class</button>
		</nav>

		<table class="table table-bordered">
			<!-- Table head -->
			<thead class="thead-light">
				<tr>
			        <th scope="row" width="4%">#</th>
			        <?php
			        //------------------- Filling the column names with the descriptions of the fields
			        while ($descriptions_array = $stmt1->fetch(PDO::FETCH_COLUMN)) {
			        	echo '<th scope="row">'. $descriptions_array . '</th>';	
			        }
			    	?>
			    	<th scope="row" width="14%">#</th>
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
							echo '<td role="button" class="hover" onclick=\'insertCV("'.$clsInfoInject_url.'", "'.$classData_array[0].'")\'>'.$i.'</td>';
							// Substituting teacher id with name
							$sql = "SELECT `name`, `surname` FROM `appletree_personnel`.`teachers` WHERE `id` = :id";
							$stmt = $pdo->prepare($sql);
							$stmt->execute([':id' => $classData_array[3]]);
							if ($data = $stmt->fetch())
								$classData_array[3] = $data['name'] . ' ' . $data['surname'];
									
							foreach ($classData_array as $key => $value) {
								// For the first column
								if ($key == 0)
									$id = $value;
								if (!is_null($value))
									echo '<td style="max-width:14em;">'.$value.'</td>';
								else
									echo '<td><i  class="text-muted">None</i></td>';								
							}
						?>		
			
						<td>
							<button class="btn btn-control" onclick="clsBrw('<?=$clsInfoInject_url?>', '<?=$id?>')"><img src="<?=$imgBrw?>" alt="Brw"></button>
							<button class="btn btn-control" onclick="clsBrw('<?=$clsEditInject_url?>', '<?=$id?>')"><img src="<?=$imgEdt?>" alt="Edt"></button>
							<button class="btn btn-control" onclick="clsDel('<?=$id?>')"><img src="<?=$imgDel?>" alt="Del"></button>
						</td>
					</tr>
		
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
<script>
	// The function sends POST form to the other file to delete the record of the given ID and role
	// from corresponding members table
	function clsDel(arg_id) {
		var confirmation = confirm("Do you want to delete this class from the database?");
		if (confirmation)
		{
			$.ajax({
				url: "<?=$classProcessing_url?>",
				type: 'POST',
				cache: false,
				data: {
					'action':'delete',
					'id':arg_id
				},
				beforeSend: function() {
					$("#loader_div").removeClass("hidden");
				},
				success: function(data){
					if (data == 0)
					{
						$("button[data-essence = 'classes']").trigger("click");
					}
					else
					{
						alert(data);
						return;
					}
				}
			});
		}
		return;
	}
	// The funtion loads full information about classes / editing interface (depending on the URL) into the '#content' div
	function clsBrw(url, arg_id = ''){
		$("#loader_div").removeClass("hidden");
		$("#content").empty();
		$("#content").load(url, { id: arg_id}, function( responseText, textStatus, jqXHR ){
			// Displaying error in console
			if (textStatus == "error") {
				let message = "'clsBrw' function error occured: ";
				console.error( message + jqXHR.status + " " + jqXHR.statusText );
			} else{
				$("#loader_div").addClass("hidden");
			}
		});
		return;
	}
</script>
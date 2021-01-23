<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}

	// Field descriptions
	$sql = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'classes' AND `table_schema` = 'appletree_personnel' ORDER BY `ORDINAL_POSITION`";
	$stmt1 = $pdo->query($sql);
	// The class's data
	$stmt2 = $pdo->query("SELECT * FROM appletree_personnel.classes");
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
	<div id="content" class="container">
		<nav class="btn-group my-4">
			<button class="px-5 btn btn-success" onclick="clsBrowse('<?=$clsEditInject_url?>')">Create a new class</button>
		</nav>

		<table class="table table-bordered schedule-table">
			<!-- Table head -->
			<thead class="thead-light">
				<tr>
			        <th scope="col">#</th>
			        <?php
			        //------------------- Filling the column names with the descriptions of the fields
			        while ($descriptions_array = $stmt1->fetch(PDO::FETCH_NUM)) {
			        	echo "<th scope='col'>". $descriptions_array[0] . "</th>";	
			        }
			    	?>
			    	<th scope="col">#</th>
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
							echo '<td class=\'p-0\'><button class=\'btn btn-secondary rounded-0\' onclick=\'insertCV("'.$id.'","'.$_POST['role'].'", "'.$memCvInject_url.'")\'>'.$i.'</button></td>';
							foreach ($classData_array as $key => $value) {
								// For the first column
								if ($key == 0)
									$id = $value;
								if (!is_null($value))
									echo "<td>$value</td>";
								else
									echo "<td><i class='text-muted'>None</i></td>";
								;	
								
							}
						?>		
			
						<td>
							<button class="btn btn-primary btn-browse" onclick="clsBrowse('<?=$clsInfoInject_url?>', '<?=$id?>')"><img src="" alt="Brw"></button>
							<button class="btn btn-primary btn-browse" onclick="clsBrowse('<?=$clsEditInject_url?>', '<?=$id?>')"><img src="" alt="Edt"></button>
							<button class="btn btn-primary btn-browse" onclick="clsDelete('<?=$id?>')"><img src="" alt="Del"></button>
						</td>
					</tr>
		
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
<script>
	// The function sends POST form to the other file to delete the record of the given ID and role
	// from corresponding members table
	function clsDelete(arg_id) {
		var confirmation = confirm("Do you want to delete this class from the database?");
		if (confirmation)
		{
			$.ajax({
				url: "<?=$clsDeleteProcessing_url?>",
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
	function clsBrowse(url, arg_id = 0){
		$("#loader_div").removeClass("hidden");
		$("#content").empty();
		$("#content").load(url, { id: arg_id}, function( responseText, textStatus, jqXHR ){
			// Displaying error in console
			if (textStatus == "error") {
				let message = "'clsBrowse' function error occured: ";
				console.error( message + jqXHR.status + " " + jqXHR.statusText );
			} else{
				$("#loader_div").addClass("hidden");
			}
		});
	}
</script>
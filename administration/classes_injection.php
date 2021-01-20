<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	
	// Fixing url address to implement links correctly
	//(otherwise url would be for this file, not the one it is being loaded to)
	$url = $_POST['url'];
	
	// Storing all necessary files in arrays for further import
	$customStylesheets_array = array("tables.style.css");
	$customScripts_array = array("loader.js",);
	//$customStyles_css = "";
	$spinner_src = $imgs . "spinner.gif";

	// Getting information about classes from the database
	$sql = "SELECT `classes`.`id`, `teachers`.`name`, `teachers`.`surname`, `classes`.`std_num` FROM `appletree_personnel`.`classes` INNER JOIN `appletree_personnel`.`teachers` ON `classes`.`id_teacher` = `teachers`.`id`";
	$stmt= $pdo->query($sql);
	$sql1 = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'teachers' AND `table_schema` = 'appletree_personnel' AND
	(`column_name` = 'name' OR `column_name` = 'surname' OR `column_name` = 'gender' OR `column_name` = 'email' OR `column_name` = 'set_date') ORDER BY `ORDINAL_POSITION`";
	$sql2 = "SELECT `id`, `name`, `surname`, `gender`, `email`, `set_date` FROM appletree_personnel.teachers";
	$stmt1 = $pdo->query($sql1);
	$stmt2 = $pdo->query($sql2);
	// Creating and filling an associative array (key = DB table's id column value, class code in other words)
	// to have a two-dimensional array and alleviate further processing
	$classesAssoc = array();
	while ($classes = $stmt->fetch()) {
		$classesAssoc[$classes["id"]] = array('name' => $classes["name"], 'surname' => $classes["surname"], 'std_num' => $classes["std_num"]);
	}
	
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
	<div class="container">
		<table class="table table-bordered schedule-table">
			<!-- Table head -->
			<thead class="thead-light">
				<tr>
			        <th scope="col">#</th>
			        <?php
			        //------------------- Filling the column names with the descriptions of the fields
			        while ($result = $stmt1->fetch(PDO::FETCH_NUM)) {
			        	echo "<th scope='col'>". $result[0] . "</th>";	
			        }
			    	?>
			    	<th scope="col">#</th>
			    </tr>
			</thead>
			<!-- Table rows -->
			<tbody>
				<?php 	//------------------- Filling the table
				$i = 0;
				while($result = $stmt2->fetch(PDO::FETCH_NUM)):
				$i++;
				?>
			
					<tr>
						<?php
							foreach ($result as $key => $value) {
								// For the first column
								if ($key == 0) {
									$id = $value;
									echo "<td class='p-0'><a class='btn btn-secondary rounded-0' data-ref-id=\"$value\" href=\"$index_url\">$i</a></td>";
								} else{
									echo "<td>$value</td>";	
								}
							}
						?>		
			
						<td data-ref-id="<?=$id?>">
							<button class="btn btn-primary btn-browse" onclick="clsBrowse('<?=$id?>', '<?=$clsCvInject_url?>')"><img src="" alt="Brw"></button>
							<button class="btn btn-primary btn-browse" onclick="clsBrowse('<?=$id?>', '<?=$clsEditInject_url?>')"><img src="" alt="Edt"></button>
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
		var confirmation = confirm("Do you want to delete this member from the database?");
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
	function clsBrowse(url, arg_id){
		$("#loader_div").removeClass("hidden");
		$("#content").empty();
		$("#content").load(url, function( responseText, textStatus, jqXHR ){
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
<!-- Importing custom scripts -->
<?php foreach ($customScripts_array as $value){	echo "<script src='$js$value'></script>".PHP_EOL; } ?>

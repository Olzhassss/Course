<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}

	// Storing all necessary files in arrays for further import
	$customStylesheets_array = array("tables.style.css");
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
		<nav class="btn-group my-4">
			<button class="px-5 btn btn-secondary" onclick="insertList('teachers')">Teachers</button>
			<button class="px-5 btn btn-secondary" onclick="insertList('students')">Students</button>
		</nav>
		<?php
		// Taking the information about teacher applications from the corresponding table in the database to fill the table on the webpage
		$sql = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'app_teachers' AND `table_schema` = 'appletree_personnel' AND
		(`column_name` = 'name' OR `column_name` = 'surname' OR `column_name` = 'gender' OR `column_name` = 'email' OR `column_name` = 'app_date') ORDER BY `ORDINAL_POSITION`";
		$stmt = $pdo->query($sql);
		?>
		<div style="overflow-x: auto;">
			<table id="content-table" class="table table-bordered schedule-table">
				<!-- Table head -->
				<thead class="thead-light">
					<tr>
				        <th scope="col">#</td>
				        <?php
				        // Filling the first row with the description of fields
				        while ($result = $stmt->fetch(PDO::FETCH_NUM)) {
				        	echo "<th scope='col'>". $result[0] . "</th>";	
				        }
				    	?>
				    	<th scope="col">#</th>
				    </tr>
				</thead>
				<!-- Table rows -->
				<tbody>
				<?php 	//------------------- Extracting information from the database table 'appletree_personnel.app_teachers'
				$stmt = $pdo->query("SELECT `id`, `name`, `surname`, `gender`, `email`, `app_date` FROM appletree_personnel.app_teachers");
				// Display results by repeating the cycle for every fetched row in the table
				while($data = $stmt->fetch(PDO::FETCH_NUM)):
				?>

					<tr>
						<?php
							foreach ($data as $key => $value) {
								// For the first column
								if ($key == 0) {
									$id = $value;
									$i = $key+1;
									echo "<td class='p-0'><a class='btn btn-secondary rounded-0' data-ref-id=\"$value\" href=\"$index_url\">$i</a></td>";
								} else{
									echo "<td>$value</td>";	
								}
							}
						?>		

						<td data-ref-id="<?=$id?>">
							<button class="btn btn-primary btn-browse" onclick="insertCV('<?=$id?>')"><img src="" alt="Brw"></button>
							<a class="btn btn-primary" href="#"><img src="" alt="Add"></a>
							<a class="btn btn-primary" href="#"><img src="" alt="Del"></a>
						</td>
					</tr>

				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</section>
		<span id="content"></span>
	</div>

<script>
	$(document).ready(function(){
	});

	// Funtion loads #body div content from the file according to the id (in database table) of the application clicked
	function insertCV(arg_id){
		$("#loader_div").removeClass("hidden");
		$("#body").empty();
		$("#body").load("<?=$appCvInject_url?>", { id: arg_id }, function( responseText, textStatus, jqXHR ){
			// Displaying error in console
			if (textStatus == "error") {
				let message = "'insertCV' function error occured: ";
				console.error( message + jqXHR.status + " " + jqXHR.statusText );
			} else{
				$("#loader_div").addClass("hidden");
			}
		});
	}

	// Funtion loads table content from the file according to which button was clicked and displays error if one occured
	function insertList(parameter){
		$("#loader_div").removeClass("hidden");
		$("#content-table").empty();
		$("#content-table").load("<?=$tableProcessing_url?>", { parameter: parameter }, function( responseText, textStatus, jqXHR ){
			// Displaying error in console
			if (textStatus == "error") {
				let message = "'insertList' function error occured: ";
				console.error( message + jqXHR.status + " " + jqXHR.statusText );
			} else{
				$("#loader_div").addClass("hidden");
			}
		});
	}
</script>
<!-- Importing custom scripts -->
<?php //foreach ($customScripts_array as $value){	echo "<script src='$js$value'></script>".PHP_EOL; } ?>


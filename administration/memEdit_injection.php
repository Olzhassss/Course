<?php 
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	// Terminate if required arguments are not passed
	if (!isset($_POST['id']) || !isset($_POST['role'])) {
		exit("False");
	}

	// Store all necessary files in arrays for further import
	$customStylesheets_array = array("tables.style.css");

	// Fetch data according to the role
	if ($_POST['role'] == 'teachers') {
		$sql1 = "SELECT `column_comment`, `column_name` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'teachers' AND `table_schema` = 'appletree_personnel' ORDER BY `ORDINAL_POSITION`";
		$stmt2 = $pdo->prepare("SELECT * FROM appletree_personnel.teachers WHERE `id` = :id");
	}
	elseif ($_POST['role'] == 'students') {
		$sql1 = "SELECT `column_comment`, `column_name` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'students' AND `table_schema` = 'appletree_personnel' ORDER BY `ORDINAL_POSITION`";
		$stmt2 = $pdo->prepare("SELECT * FROM appletree_personnel.students WHERE `id` = :id");
	}
	// Terminate if the argument has incorrect value
	else { exit("False1"); }

	// Fetch columns' despcriptions and names
	$stmt1 = $pdo->query($sql1);
	$columnData_array = $stmt1->fetchAll();
	// Fetch particular record's data
	$stmt2->execute([':id' => $_POST['id']]);
	$recordData_array = $stmt2->fetch(PDO::FETCH_NUM);
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

	<div class="w-75 d-flex justify-content-between">
		<button class="btn btn-success w-50 mx-4" onclick="memUpd(<?=$_POST['id']?>, '<?=$_POST['role']?>')">Save changes</button>
		<button class="btn btn-warning w-50 mx-4" onclick="memDel(<?=$_POST['id']?>, '<?=$_POST['role']?>')">Delete</button>
	</div>
	
	<form class="mt-3">
		<table class="table table-bordered">
			<!-- Table rows -->
			<?php foreach ($columnData_array as $key => $value ):?>

			    <tr>
			    	<th scope='col' width="40%" ><?=$value["column_comment"]?></th>
			    	<td>
			    		<input type="text" class="form-control" name="<?=$value["column_name"]?>" required="true" value="<?=$recordData_array[$key]?>">
			    	</td>
			    </tr>
				
			<?php endforeach;?>
		</table>
	</form>
<script>
	function memUpd(arg_id, role) {
		// Get an array of objects for every
		let fields = $('input[type="text"]').serializeArray();
		let data = new Object();
		fields.forEach(function(value){ data[value['name']] = value['value']; })
		data['role'] = '<?=$_POST['role']?>';
		$.ajax({
			url: "<?= $cvUpdProcessing_url ?>",
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
						insertList('<?=$_POST['role']?>','<?=$memTables_url?>');
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
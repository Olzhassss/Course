<?php 
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	// Terminate if required arguments are not passed
	if (!isset($_POST['id'])) {
		exit("False");
	}

	// Store all necessary files in arrays for further import
	$customStylesheets_array = array("tables.style.css");

	// Fetch data 
	$sql1 = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'classes' AND `table_schema` = 'appletree_personnel' ORDER BY `ORDINAL_POSITION`";
	$stmt2 = $pdo->prepare("SELECT * FROM `appletree_personnel`.`classes` WHERE `id` = :id");
	// Fetch column descriptions into an array
	$stmt1 = $pdo->query($sql1);
	$descriptions_array = $stmt1->fetchAll(PDO::FETCH_COLUMN);
	// Fetch particular record's data
	$stmt2->execute([':id' => $_POST['id']]);
	$classData_array = $stmt2->fetch(PDO::FETCH_BOTH);
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
		<button class="btn btn-success w-50 mx-4" onclick="clsBrowse('<?=$clsEditInject_url?>', '<?=$id?>')">Edit</button>
		<button class="btn btn-warning w-50 mx-4" onclick="clsDelete('<?=$id?>')">Delete</button>
	</div>
	
	<div class="my-3">
		<table class="table table-bordered">
			<!-- Table rows -->
			<?php foreach ($descriptions_array as $key => $value):?>

			    <tr>
			    	<th scope='col' width="40%" ><?=$value?></th>
			    	<td><?=$classData_array[$key]?>
			    	</td>
			    </tr>
				
			<?php endforeach;?>
			<!-- from clsEdit_injection.php <a href="#" data-ref-id="<?=$recordData_array['id_teacher']?>"><?=$teacher?></a> -->
		</table>
	</div>
<script>
	
</script>


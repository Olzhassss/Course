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

	// Fetch descriptions
	$sql = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'classes' AND `table_schema` = 'appletree_personnel' ORDER BY `ORDINAL_POSITION`";
	$stmt = $pdo->query($sql);
	$descriptions_array = $stmt->fetchAll(PDO::FETCH_COLUMN);
	
	// Fetch particular record's data
	$stmt = $pdo->prepare("SELECT * FROM `appletree_personnel`.`classes` WHERE `id` = :id");
	$stmt->execute([':id' => $_POST['id']]);
	$classData_array = $stmt->fetch(PDO::FETCH_BOTH);

	// Fetch the class's teacher's name and surname
	$stmt = $pdo->prepare("SELECT `name`, `surname` FROM `appletree_personnel`.`teachers` WHERE `id` = :id");
	$stmt->execute([':id' => $classData_array['id_teacher']]);
	$data = $stmt->fetch();
	$teacherName = $data['name'] . ' ' . $data['surname'];
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

	<h1 class="mb-3 mt-5"><?=$classData_array['id'].', '.$teacherName ?></h1>
	<div class="w-75 d-flex justify-content-between">
		<button class="btn btn-success w-50 mx-4" onclick="clsBrowse('<?=$clsEditInject_url?>', '<?=$_POST['id']?>')">Edit</button>
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


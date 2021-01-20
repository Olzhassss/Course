<?php 
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	// Terminate if required argument is not passed
	if (!isset($_POST['id']) || !isset($_POST['role'])) {
		exit("False");
	}

	// Store all necessary files in arrays for further import
	$customStylesheets_array = array("tables.style.css");
	$customScripts_array = array("insertList.js");

	// Fetch data according to the role
	if ($_POST['role'] == "teachers") {
		$sql1 = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'app_teachers' AND `table_schema` = 'appletree_personnel' ORDER BY `ORDINAL_POSITION`";
		$stmt2 = $pdo->prepare("SELECT * FROM appletree_personnel.app_teachers WHERE `id` = :id");
		
	}
	elseif ($_POST['role'] == "students") {
		$sql1 = "SELECT `column_comment` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'app_students' AND `table_schema` = 'appletree_personnel' ORDER BY `ORDINAL_POSITION`";
		$stmt2 = $pdo->prepare("SELECT * FROM appletree_personnel.app_students WHERE `id` = :id");
	}
	// Terminate if the argument has incorrect value
	else { exit("False"); }

	// Fetch column descriptions into an array
	$stmt1 = $pdo->query($sql1);
	$descriptions_array = $stmt1->fetchAll(PDO::FETCH_COLUMN);
	// Fetch particular record's data
	$stmt2->execute([':id' => $_POST['id']]);
	$data_array = $stmt2->fetch(PDO::FETCH_NUM);
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

	<h1 class="my-3">Name Surname (id)</h1>
	<div class="w-75 d-flex justify-content-between">
		<button class="btn btn-success w-50 mx-4" onclick="appAdd(<?=$_POST['id']?>, '<?=$_POST['role']?>')">Accept</button>
		<button class="btn btn-warning w-50 mx-4" onclick="appDel(<?=$_POST['id']?>, '<?=$_POST['role']?>')">Reject</button>
	</div>
	
	<div class="mt-3">
		<table class="table table-bordered">
			<!-- Table rows -->
			<?php foreach ($descriptions_array as $key => $value ):?>

			    <tr>
			    	<th scope='col' width="40%" ><?=$value?></th>
			    	<td><?=$data_array[$key]?>
			    	</td>
			    </tr>
				
			<?php endforeach;?>
		</table>
	</div>
<script>
	
</script>

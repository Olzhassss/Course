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
	
	<form id="form" class="mt-3">
		<?php 
			if ($_POST['role'] == 'students')
				include_once($memStdEdtTbInject_ldp);
			else
				include_once($memTchEdtTbInject_ldp);
		?>
	</form>
<script>
	// Pass data to update the record of the corresponding member
	function memUpd(arg_id, role) {
		// Get an array of objects for every form field
		let fields = $('form#form').serializeArray();
		let data = new Object();
		fields.forEach(function(value){ data[value['name']] = value['value']; })
		data['role'] = role;
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
						insertList(role,'<?=$memTables_url?>');
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
<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}

	// Storing all necessary files in arrays for further import
	$customScripts_array = array("insert.js");
?>
	<head>
		<?php
		if (!empty($customStylesheets_array))
		{
		    foreach ($customStylesheets_array as $value) { echo "<link rel='stylesheet' href=$css$value>".PHP_EOL; }
		}
		if (!empty($customStyles_css)) { echo "<style> $customStyles_css </style>".PHP_EOL; }
		?>
	</head>
	<div class="container">
		<nav class="btn-group my-4">
			<button class="px-5 btn btn-secondary" onclick="insertList('teachers','<?=$appTables_url?>')">Teachers</button>
			<button class="px-5 btn btn-secondary" onclick="insertList('students','<?=$appTables_url?>')">Students</button>
		</nav>

		<div id="content" style="overflow-x: auto;">
				<?php
					if($_POST['role'] == '')
						$_POST['role'] = 'teachers';
					include_once($appTables_ldp);
				?>
		</div>
	</div>
<script>
	// The function sends POST form to the other file to insert new record
	// with data from the record of the given ID and role
	function appAdd(arg_id, role){
		$.ajax({
			url: "<?=$recordProcessing_url?>",
			type: 'POST',
			cache: false,
			data: {
				'action':'add',
				'id':arg_id,
				'role':role
			},
			beforeSend: function() {
				$("#loader_div").removeClass("hidden");
			},
			success: function(data){
				if (data == 0)
				{
					var result = confirm("The applicant has been successfully added to the database! Press OK to remain on this page.")
					if (result)
						insertList(role, "<?=$appTables_url?>");
					else
						// Redirect to CV editing interface
						$("button[data-essence = 'members']").trigger("click", ["editor", arg_id, role]);
					return;
				}
				else
				{
					alert(data);
					return;
				}
			}
		});
		return;
	}


	// The function sends POST form to the other file to delete the record of the given ID and role
	// from corresponding applications table
	function appDel(arg_id, role) {
		var confirmation = confirm("Do you want to delete this application from the database?");
		if (confirmation)
		{
			$.ajax({
				url: "<?=$recordProcessing_url?>",
				type: 'POST',
				cache: false,
				data: {
					'action':'delete',
					'id':arg_id,
					'role':role
				},
				beforeSend: function() {
					$("#loader_div").removeClass("hidden");
				},
				success: function(data){
					if (data == 0)
					{
						insertList(role, "<?=$appTables_url?>");
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
</script>
<!-- Importing custom scripts -->
<?php foreach ($customScripts_array as $value){	echo "<script src='$js$value'></script>".PHP_EOL; } ?>


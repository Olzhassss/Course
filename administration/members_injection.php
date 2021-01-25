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
			<button class="px-5 btn btn-secondary py-3" onclick="insertList('teachers','<?=$memTables_url?>')">Teachers</button>
			<button class="px-5 btn btn-secondary py-3" onclick="insertList('students','<?=$memTables_url?>')">Students</button>
		</nav>

		<div id="content">
				<?php
					// Load further injectable addons if is needed
					// if ($_POST['derivative'] == 'browser')
					// 	include_once($memCvInject_ldp);
					// elseif ($_POST['derivative'] == 'editor'){
					// 	include_once($memEditInject_ldp);

					// }
					// else
					if($_POST['role']=='')
						$_POST['role'] = 'teachers';
					include_once($memTables_ldp);
				?>
		</div>
	</div>
<script>
	// The function sends POST form to the other file to delete the record of the given ID and role
	// from corresponding members table
	function memDel(arg_id, role) {
		var confirmation = confirm("Do you want to delete this member from the database?");
		if (confirmation)
		{
			$.ajax({
				url: "<?=$cvDelProcessing_url?>",
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
						insertList(role, "<?=$memTables_url?>");
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

	// The function loads editing interface for a record (of the given ID and role) from the file into the '#content' div
	function memEdt(arg_id, role){
		$("#loader_div").removeClass("hidden");
		$("#content").empty();
		$("#content").load("<?=$memEditInject_url?>", { id: arg_id, role: role},
			function (responseText, textStatus, jqXHR ){
				// Displaying error in console
				if (textStatus == "error") {
					let message = "'memEdt' function error occured: ";
					console.error( message + jqXHR.status + " " + jqXHR.statusText );
				} else{
					$("#loader_div").addClass("hidden");
				}
			});
	}
</script>
<!-- Importing custom scripts -->
<?php foreach ($customScripts_array as $value){	echo "<script src='$js$value'></script>".PHP_EOL; } ?>
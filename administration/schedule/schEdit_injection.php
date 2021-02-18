<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	
	// Storing all necessary files' names in arrays for further import
	$customStylesheets_array = array('navbar_schedule.style.css');

	// Used to fill <select>
	$days_array = array('Monday','Tuesday','Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

	// Getting information about class teachers from the database
	$sql = 'SELECT `classes`.`id`, `teachers`.`name`, `teachers`.`surname`, `classes`.`std_num` FROM `appletree_personnel`.`classes` INNER JOIN `appletree_personnel`.`teachers` ON `classes`.`id_teacher` = `teachers`.`id`';
	$stmt= $pdo->query($sql);
	
	// Creating and filling an associative array (key = DB table's id column value, class code in other words)
	// to have a two-dimensional array and alleviate further processing
	$classesAssoc = array();
	while ($classes = $stmt->fetch()) {
		$classesAssoc[$classes['id']] = array('name' => $classes['name'], 'surname' => $classes['surname'], 'std_num' => $classes['std_num']);
	}
?>
	<head>
		<?php
		if (!empty($customStylesheets_array))
		    foreach ($customStylesheets_array as $value) { echo "<link rel='stylesheet' href=$css$value>".PHP_EOL; }
		if (!empty($customStyles_css)) { echo "<style> $customStyles_css </style>".PHP_EOL; }
		?>
	</head>

	<div class="container">
		<nav class="my-4 w-50 d-flex">
			<button class="btn btn-success w-50 py-3 m-4" onclick="schUpd('<?=$scheduleProcessing_url?>')">Save changes</button>
			<button class="btn btn-warning w-50 py-3 m-4" onclick="insertInterface(true)">Reload without save</button>
		</nav>
		<hr>

		<!-- ADD ROOM EDITING TABLE -->
		<div>
			<select class="form-control m-3 w-25" id="day-select">
				<?php foreach ($days_array as $value){
					echo '<option value="'.$value.'">'.$value.'</option>';
				}
				?>
			</select>
		</div>
		<div class="d-flex align-items-center">
			<select class="form-control m-3 w-50" id="class-select">
				<option value="Empty">Empty</option>
				<?php foreach ($classesAssoc as $class => $data){
					echo '<option value="'.$class.'">'.$class.', '.$data['name'].' '.$data['surname'].' ('.$data['std_num'].' student[s])'.'</option>';
				}
				?>
			</select>
			<button id="btn-selector" class="btn btn-primary h-50" data-toggle="on" onclick="toggleSelector()">Select</button>
		</div>
		

		<div id="table-div">
		</div>
	</div>

<script>
	$(document).ready(function(){
		// Binding the 'insertInterface' and 'applySelector' functions to each 'select'
		$("#day-select").change(function(){insertInterface();});
		$("#class-select").change(applySelector);
		// Set the day select value according to clicked 'Edit' button
		$("#day-select").val('<?= $_POST['day'] ?>');
		// Trigger schedule table loading
		$("#day-select").change();
	})

	// This is toggled if some changes are made
	var checkFlag = false;
	// This is toggled if selector is activated
	var selectorFlag = false;
	// This is used to apply activated selector value to table cells
	var classSelectorValue = null;

	// The function loads the selected day's schedule table editing interface
	// It also requires confirmation if some changes were made and not saved (= the 'checkFlag' is set to 'true')
	function insertInterface(forcebly = false){
		if(checkFlag && !forcebly){
			let confirmation = confirm('It seems like you have made some changes! If you proceed, changes will not be saved!');
			if (!confirmation)
				return;
		}
		let tableName = $("#day-select").val();
		$("#loader_div").removeClass("hidden");
		$("#table-div").empty();
		$("#table-div").load('<?=$schStdEdtTbInject_url?>', { 'day': tableName }, function( responseText, textStatus, jqXHR ){
			// Displaying an error in console
			if (textStatus == "error") {
				let message = "'insertInterface' function error occured: ";
				console.error( message + jqXHR.status + " " + jqXHR.statusText );
			} else{
				bindButtons("table-button");
				$("#loader_div").addClass("hidden");
			}
		});
		checkFlag = false;
		return;
	}
	// The function toggles selector flag and changes selector button attributes (including text value)
	function toggleSelector(){
		let obj = $("button#btn-selector");
		if (obj.attr('data-toggle') == 'on') {
			selectorFlag = true;
			$("#class-select").change();
			obj.attr('data-toggle', 'off');
			obj.text('Deselect');
		} else {
			selectorFlag = false;
			obj.attr('data-toggle', 'on');
			obj.text('Select');
		}
		return;
	}
	// The function assigns value for the 'classSelectorValue' if selector is activated (= 'selectorFlag' is set to 'true')
	function applySelector(){
		if (selectorFlag) { classSelectorValue = $("#class-select").val(); }
		return;
	}
	// The function binds each table button to apply new text value if selector is activated
	// (= the 'selectorFlag' is set to 'true'). It also toggles 'checkFlag'
	function bindButtons(btn_class){
		$('.'+btn_class).click(function(){
			if (selectorFlag) {
				// Change td text (muted if 'Empty')
				$(this).children("span").html((classSelectorValue == 'Empty')? '<i class="text-muted">'+classSelectorValue+'</i>' : classSelectorValue);
				// Set input value but as empty string if 'Empty' was selected
				$(this).children("input").val((classSelectorValue == 'Empty')? '' : classSelectorValue);
				if (!checkFlag){checkFlag = true;}
			}
			return;
		});
		return;
	}
	// The functions sends ajax request to process changed table
	function schUpd(url){
		if(!checkFlag)
			return alert('No changes were made.');
		// Get the number of columns with related data and the day name from table attributes
		let limit = $("form#form").attr('data-col-number');
		let day = $("form#form").attr('data-day');
		// Fill an object of objects with properties equal to values of every record's data
		// (analogue of two-dimensional array)
		var data = new Object();
		for (let i = limit; i >= 0; i--) {
			data[i]= new Object();
			let row = $("input.column-"+i).serializeArray();
			row.forEach(function(value){ data[i][value['name']] = value['value']; })
		}
		// Sending data to processing file
		$.ajax({
			url: url,
			type: 'POST',
			cache: false,
			data: {'tableData': data, 'tableName': day},
			beforeSend: function() {
				$("#loader_div").removeClass("hidden");
			},
			success: function(reply){
				if (reply == 0){
					alert("Update is successul!");
					checkFlag = false;
				} else
					alert(reply);
				return;
			}
		})
		$("#loader_div").addClass("hidden");
		return;
	}
</script>
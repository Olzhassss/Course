<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}
	
	// Storing all necessary files in arrays for further import
	$customStylesheets_array = array("navbar_schedule.style.css");
	$customScripts_array = array();
	//$customStyles_css = "";
	//$spinner_src = $imgs . "spinner.gif";
	$days_array = array("Monday","Tuesday","Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

	// Getting information about class teachers from the database
	$sql = "SELECT `classes`.`id`, `teachers`.`name`, `teachers`.`surname`, `classes`.`std_num` FROM `appletree_personnel`.`classes` INNER JOIN `appletree_personnel`.`teachers` ON `classes`.`id_teacher` = `teachers`.`id`";
	$stmt= $pdo->query($sql);
	
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
		<nav class="my-4 w-50 d-flex">
			<button class="btn btn-success w-50 py-3 m-4" onclick="txtUpd('<?=$appTables_url?>')">Save changes</button>
			<button class="btn btn-warning w-50 py-3 m-4" onclick="txtUpd('<?=$appTables_url?>')">Reload without save</button>
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
				<?php foreach ($classesAssoc as $class => $data){
					echo '<option value="'.$class.'">'.$class.', '.$data['name'].' '.$data['surname'].' ('.$data['std_num'].' student[s])'.'</option>';
				}
				?>
			</select>
			<button class="btn btn-primary h-50" data-toggle="on" onclick="toggleSelector(this)">Select</button>
		</div>
		

		<div id="table-div">
		</div>
	</div>

<!-- Importing custom scripts -->
<?php foreach ($customScripts_array as $value){	echo "<script src='$js$value'></script>".PHP_EOL; } ?>
<script>
	// Binding the 'insertInterface' and 'applySelector' function to each 'select'
	$(document).ready(function(){
		$("#day-select").change(insertInterface);
		$("#day-select").change();
		$("#class-select").change(applySelector);
		//$("")
	})

	var checkFlag = false;
	var selectorFlag = false;
	var classSelector = null;

	function bindButtons(btn_class){
		$('.'+btn_class).click(function(){
			if (selectorFlag) {
				$(this).text(classSelector);
				if (!checkFlag){checkFlag = true;}
			}
			return;
		});
		return;
	}
	function insertInterface(event){
		if(checkFlag){
			let confirmation = confirm('It seems like you have made some changes! If you proceed, changes will not be saved!');
			if (!confirmation)
				return;
		}

		let tableName = $(this).val();
		let offset = window.pageYOffset;
		$("#loader_div").removeClass("hidden");
		$("#table-div").empty();
		$("#table-div").load('<?=$schStdEdtTbInject_url?>', { 'day': tableName }, function( responseText, textStatus, jqXHR ){
			// Displaying error in console
			if (textStatus == "error") {
				let message = "'insertInterface' function error occured: ";
				console.error( message + jqXHR.status + " " + jqXHR.statusText );
			} else{
				bindButtons("table-button");
				window.scrollBy(0, offset);
				$("#loader_div").addClass("hidden");
			}
		});
		return;
	}
	function toggleSelector(obj){
		if ($(obj).attr('data-toggle') == 'on') {
			selectorFlag = true;
			$("#class-select").change();
			$(obj).attr('data-toggle', 'off');
			$(obj).text('Deselect');
		} else {
			selectorFlag = false; //($("#class-select").val() == 'Empty')? null : $("#class-select").val();	
			$(obj).attr('data-toggle', 'on');
			$(obj).text('Select');
		}
		return;
	}
	function applySelector(event){
		if (selectorFlag) { classSelector = $("#class-select").val(); }
		return;
	}
	function schUpd(url){
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
				if (reply == 0)
					alert("Update is successul!");
				else
					alert(reply);
				return;
			}
		})
		$("#loader_div").addClass("hidden");
		return;
	}
</script>
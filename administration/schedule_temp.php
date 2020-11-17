<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 


	require_once ($connection_config);
	session_start();

	if (!isset($_SESSION['user_login'])) {
		header('Location:sign_in.php');
	}

	$url = $_POST['url'];

	// Storing all necessary files in arrays for further import
	$customStylesheets_array = array("tables.style.css", "navbar_schedule.style.css");
	$customScripts_array = array("loader.js", "smooth_scroll.js", "scroll_schedule_page.js");
	//$customStyles_css = "";
	$spinner_src = $imgs . "spinner.gif";
	$days_array = array("Monday","Tuesday","Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

	// Getting information about classes from the database
	$sql = "SELECT classes.id, teachers.name, teachers.surname, classes.std_num FROM appletree_personnel.classes INNER JOIN appletree_personnel.teachers ON classes.id_teacher = teachers.id";
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
	<div id="navbar" class="navbar w-100 shadow">
		<nav>
			<ul class="row" style="list-style-type: none;">
				<li class="col-4 col-sm mb-3 mb-xl-0"><a class="text-truncate w-100 btn btn-light border border-info" href="<?=$url?>#headerdiv">Up</a></li>
				<li class="col-4 col-sm mb-3 mb-xl-0"><a class="text-truncate w-100 btn btn-light" href="<?=$url?>#section-monday">Monday</a></li>
				<li class="col-4 col-sm mb-3 mb-xl-0"><a class="text-truncate w-100 btn btn-light" href="<?=$url?>#section-tuesday">Tuesday</a></li>
				<li class="col-4 col-sm mb-3 mb-xl-0"><a class="text-truncate w-100 btn btn-light" href="<?=$url?>#section-wednesday">Wednesday</a></li>
				<li class="col-4 col-sm mb-3 mb-xl-0"><a class="text-truncate w-100 btn btn-light" href="<?=$url?>#section-thursday">Thursday</a></li>
				<li class="col-4 col-sm mb-3 mb-xl-0"><a class="text-truncate w-100 btn btn-light" href="<?=$url?>#section-friday">Friday</a></li>
				<li class="col-4 col-sm mb-3 mb-xl-0"><a class="text-truncate w-100 btn btn-light" href="<?=$url?>#section-saturday">Saturday</a></li>
				<li class="col-4 col-sm mb-3 mb-xl-0"><a class="text-truncate w-100 btn btn-light" href="<?=$url?>#section-sunday">Sunday</a></li>
			</ul>
		</nav>
	</div>
	<div class="container">
		<section id="section-navbar">
				<nav>
					<ul class="row px-0" style="list-style-type: none;">
						<li class="col-6 col-md-3 col-xl mb-3 mb-xl-0"><a class="w-100 btn btn-light border border-info" href="<?=$url?>#headerdiv">Up</a></li>
						<li class="col-6 col-md-3 col-xl mb-3 mb-xl-0"><a class="w-100 btn btn-light" href="<?=$url?>#section-monday">Monday</a></li>
						<li class="col-6 col-md-3 col-xl mb-3 mb-xl-0"><a class="w-100 btn btn-light" href="<?=$url?>#section-tuesday">Tuesday</a></li>
						<li class="col-6 col-md-3 col-xl mb-3 mb-xl-0"><a class="w-100 btn btn-light" href="<?=$url?>#section-wednesday">Wednesday</a></li>
						<li class="col-6 col-md-3 col-xl mb-3 mb-xl-0"><a class="w-100 btn btn-light" href="<?=$url?>#section-thursday">Thursday</a></li>
						<li class="col-6 col-md-3 col-xl mb-3 mb-xl-0"><a class="w-100 btn btn-light" href="<?=$url?>#section-friday">Friday</a></li>
						<li class="col-6 col-md-3 col-xl mb-3 mb-xl-0"><a class="w-100 btn btn-light" href="<?=$url?>#section-saturday">Saturday</a></li>
						<li class="col-6 col-md-3 col-xl mb-3 mb-xl-0"><a class="w-100 btn btn-light" href="<?=$url?>#section-sunday">Sunday</a></li>
					</ul>
				</nav>
		</section>
		<hr>
		
		<?php foreach ($days_array as $weekDay):
			$weekDay_lowered = strtolower($weekDay);

			// Taking information about time sessions from the corresponding table in the database to fill schedule table on the webpage later
			$sql = "SELECT `session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM appletree_schedule.$weekDay_lowered WHERE `id` = 0";
			$stmt = $pdo->query($sql);
			// One day's (webpage) table's first row's records (id = 0)
			$sessionColumn = $stmt->fetch(PDO::FETCH_NUM);

			$sql = "SELECT `room`,`session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM appletree_schedule.$weekDay_lowered WHERE NOT `id` = 0";
			$stmt = $pdo->query($sql);
			// The day's (webpage) table's other row's records (with class code) as an array of arrays
			$sessionRows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			
			echo "<section id='section-$weekDay_lowered'>
			<p class='display-4 mb-4 pb-4'>$weekDay</p>";
			?>
			<div style="overflow-x: auto;">
			<table class="table table-bordered">
				<!-- Table head -->
				<thead class="thead-light">
					<tr>
				        <th scope="col">Session\Room</td>
				        <?php
				        // Filling the first row with auditory numbers
				        foreach ($sessionRows as $val):
				        	echo "<th scope='col'>Room ". $val['room']. "</th>";
				    	endforeach;?>
				    </tr>
				</thead>
				<!-- Table rows -->
				<tbody>
				<?php
				// Filling first record of every row with session time
				foreach ($sessionColumn as $key=>$value): ?>
					<tr class="tr tr-<?=$key?>">
						<th scope="col"><?=$value?></th>

				        <?php
				        // Filling next records of the current rows with class codes
				        foreach ($sessionRows as $val):
				        	// The variable used to access the field (in DB) corresponting to the row of the webpage table
				        	$session = "session". ($key+1);
				        	
				        	if (isset($val[$session])) {
				        		if (isset($classesAssoc[$val[$session]])) {
				        			$val[$session]= $val[$session] . ', ' . $classesAssoc[$val[$session]]['name'] . ' ' . $classesAssoc[$val[$session]]['surname'] . ', ' . $classesAssoc[$val[$session]]['std_num'] . ' student(s)';
				        		}
				        		//var_dump($classesAssoc[$val[$session]]);
				        		
				        		echo "<td scope=''>$val[$session]</td>";
				        	}
				        	else
				        	{
				        		echo '<td><i style="color: rgb(168, 168, 168); pointer-events: none;">EMPTY</i></td>';
				        	}
				        endforeach;?>
				        
				    </tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			</div>
		</section>


		<?php endforeach;?>
		<section id="section-monday">
			<h3>Monday</h3>
			
			
			<table class="table table-bordered">
				<thead class="thead-light">
					<tr>
				        <th scope="col">#</td>
				        <th scope="col">Teacher</th>
				        <th scope="col">Room</th>
				        <th scope="col">Number of students</th>
				    </tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row" rowspan="2">session_timeline</th>
				        <td>name (select lessons.room lessons.std_num teachers.name teachers.surname from lessons inner join teachers on lessons.id_teacher = teachers.id)</td>
				        <td>rooms</td>
				        <td>std_num</td>
				    </tr>
				    <tr>
				    	<td>name (select lessons.room lessons.std_num teachers.name teachers.surname from lessons inner join teachers on lessons.id_teacher = teachers.id)</td>
				        <td>rooms</td>
				        <td>std_num</td>
				    </tr>
				</tbody>
			</table>
		</section>
	</div>

<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	$(document).ready(function(){
		console.log("successful");
		fix_loader("loader_div");
		
	})
</script>
<?php
foreach ($customScripts_array as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>

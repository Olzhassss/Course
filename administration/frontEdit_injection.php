<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once ($connection_config);
	
	session_start();
	// Block access for unathorized users
	if (!isset($_SESSION['user_login'])) {
		header("Location:$authorizationPage_url");
	}

	// Fetch descriptions
	//$sql = "SELECT `column_comment`,`column_name` FROM `information_schema`.`COLUMNS` WHERE `table_name` = 'students' AND `table_schema` = 'appletree_general' ORDER BY `ORDINAL_POSITION`";
	//$stmt = $pdo->query($sql);
	//$columnsData_array = $stmt->fetchAll();
	$customStyles_css = 'tr.borderless td { padding:1rem; } tr.borderless td input, textarea { border-color: transparent!important; }'
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
		<nav class="my-4 w-50 d-block">
			<button class="btn btn-success w-50 py-3 m-4" onclick="txtUpd('<?=$appTables_url?>')">Save changes</button>
		</nav>
		<hr>

		<label class="mt-3 mb-2 pl-3" for="form-1"><h2 class="font-weight-light">General information table</h2></label>
		<table id="form-1" class="table table-bordered">
			<tbody>
					<?php // Fetch short texts
					$stmt = $pdo->query("SELECT `id`,`description`,`text` FROM `appletree_general`.`short_texts`");
					while ($record = $stmt->fetch()):?>
						<tr class="borderless">
							<th scope='col' width="40%" ><?=$record["description"]?></th>
							<td>
								<textarea rows="1" maxlength="400" type="text" data-field="text" data-table="short_texts" name="<?=$record["id"]?>" class="form-control"><?=$record["text"]?></textarea>
							</td>
						</tr>
					<?php endwhile;
						// Fetch social media data
					$stmt = $pdo->query("SELECT * FROM `appletree_general`.`social_media`");
					while ($record = $stmt->fetch()):?>
						<tr class="borderless">
							<th scope='col'><?=$record["description"]?></th>
							<td>
								<textarea rows="1" maxlength="255" type="text" data-table="social_media" name="<?=$record["id"]?>" class="form-control"><?=$record["href"]?></textarea>
							</td>
						</tr>
					<?php endwhile;
						// Fetch carousel imgs data
					$stmt = $pdo->query("SELECT * FROM `appletree_general`.`carousel_imgs`");
					while ($record = $stmt->fetch()):?>
						<tr class="borderless">
							<th scope='col'>Carousel image (file name) #</th>
							<td>
								<textarea rows="1" maxlength="100" type="text" data-table="carousel_imgs" name="<?=$record["id"]?>" class="form-control"><?=$record["img_file_name"]?></textarea>
							</td>
						</tr>
					<?php endwhile; ?>
			</tbody>
		</table>

		<label class="mt-3 mb-2 pl-3" for="form-2"><h2 class="font-weight-light">Working terms and FAQ information table</h2></label>
		<table id="form-2" class="table table-bordered">
			<tbody>
					<?php // Fetch short texts
					$stmt = $pdo->query("SELECT * FROM `appletree_general`.`work_schedule`");
					while ($record = $stmt->fetch()):?>
						<tr class="borderless">
							<th scope='col' width="15%" ><?=$record["day_of_week"]?></th>
							<td width="30%">
								<input maxlength="50" type="text" data-field="working_time" data-table="work_schedule" name="<?=$record["id"]?>" class="form-control border-0" value="<?=$record["working_time"]?>">
							</td>
							<td>
								<input maxlength="50" type="text" data-field="app_time" data-table="work_schedule" name="<?=$record["id"]?>" class="form-control border-0" value="<?=$record["app_time"]?>">
							</td>
						</tr>
					<?php endwhile; ?>

					<tr class="bg-light"><th></th><td></td><td></td></tr>

					<?	  // Fetch form tabs data
					$stmt = $pdo->query("SELECT * FROM `appletree_general`.`form_tabs`");
					while ($record = $stmt->fetch()):?>
						<tr class="borderless">
							<th scope='col' >Tab #</th>
							<td class="p-1">
								<textarea rows="5" maxlength="100" type="text" data-table="form_tabs" name="<?=$record["id"]?>" class="form-control border-0"><?=$record["title"]?></textarea>
							</td>
							<td class="p-1">
								<textarea rows="5" maxlength="1000" type="text" data-table="form_tabs" name="<?=$record["id"]?>" class="form-control border-0"><?=$record["content"]?></textarea>
							</td>
						</tr>
					<?php endwhile; ?>

					<tr class="bg-light"><th></th><td></td><td></td></tr>

					<?    // Fetch FAQ data
					$stmt = $pdo->query("SELECT * FROM `appletree_general`.`faqs`");
					while ($record = $stmt->fetch()):?>
						<tr class="borderless">
							<th scope='col' >Question #</th>
							<td class="p-1">
								<textarea rows="4" maxlength="255" type="text" data-table="faqs" name="<?=$record["id"]?>" class="form-control border-0"><?=$record["question"]?></textarea>
							</td>
							<td class="p-1">
								<textarea rows="4" maxlength="650" type="text" data-table="faqs" name="<?=$record["id"]?>" class="form-control border-0"><?=$record["answer"]?></textarea>
							</td>
						</tr>
					<?php endwhile; ?>
			</tbody>
		</table>

	</div>
<!--
				
				<?php
				$i = 2;
				while ( $i < 4):?>
					<tr>
						<th scope='col' width="40%" ><?=$columnsData_array[$i]["column_comment"]?></th>
						<td>
							<input type="text" class="form-control" name="<?=$columnsData_array[$i]["column_name"]?>" required="true" value="<?=$recordData_array[$i]?>">
						</td>
					</tr>
				<?php $i++; endwhile;?>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[4]["column_comment"]?></th>
					<td>
						<select class="form-control" name="<?=$columnsData_array[4]["column_name"]?>">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>	
					</td>
				</tr>
				<?php
				$i = 5;
				while ( $i < 8):?>
					<tr>
						<th scope='col' width="40%" ><?=$columnsData_array[$i]["column_comment"]?></th>
						<td>
							<input type="text" class="form-control" name="<?=$columnsData_array[$i]["column_name"]?>" required="true" value="<?=$recordData_array[$i]?>">
						</td>
					</tr>
				<?php $i++; endwhile;?>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[8]["column_comment"]?></th>
					<td>
						<select class="form-control" name="<?=$columnsData_array[8]["column_name"]?>">
							<option value="1">Group</option>
							<option value="0">Private</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[9]["column_comment"]?></th>
					<td>
						<select class="form-control" name="<?=$columnsData_array[9]["column_name"]?>">
							<option value="Undetermined">Undetermined</option>
							<option value="Elementary">Elementary</option>
							<option value="Pre-Intermediate">Pre-Intermediate</option>
							<option value="Upper-intermediate">Upper-intermediate</option>
							<option value="Intermediate">Intermediate</option>
							<option value="Advanced">Advanced</option>
						</select>	
					</td>
				</tr>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[11]["column_comment"]?></th>
					<td>
						<select class="form-control" name="<?=$columnsData_array[11]["column_name"]?>" >
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope='col' width="40%" ><?=$columnsData_array[10]["column_comment"]?></th>
					<td>
						<input type="text" disabled="true" class="form-control" value="<?=$recordData_array[10]?>">
						<input type="hidden" name="<?=$columnsData_array[10]["column_name"]?>" required="true" value="<?=$recordData_array[10]?>">
					</td>
				</tr>-->

				<?php /* foreach ($columnsData_array as $key => $value ):?>

				    <tr>
				    	<th scope='col' width="40%" ><?=$value["column_comment"]?></th>
				    	<td>
				    		<input type="text" class="form-control" name="<?=$value["column_name"]?>" required="true" value="<?=$recordData_array[$key]?>">
				    	</td>
				    </tr>
					
				<?php endforeach; */ ?>
<script>
	var flags = new Object();
	$(document).ready(function(){
		$('textarea').change(function(){ flags[$(this).attr('data-table')] = true; console.log("triggered");});
		$('input').change(function(){ flags[$(this).attr('data-table')] = true; console.log("triggered");});
	});

	function txtUpd(url){
		let data = new Object();

		let fields = $('textarea[data-table="short_texts"]').serializeArray();
		fields.forEach(function(value){ data[value['name']] = value['value']; })
		
		console.log(data);
		return;
		data['action'] = action;
		data['id'] = arg_id;		
		$.ajax({
			url: "<?= $classProcessing_url ?>",
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
						$("button[data-essence = 'classes']").trigger("click");
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
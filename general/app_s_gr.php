<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	require_once($connection_config);

	$title = 'Application form for students!';
	// Storing all necessary files in arrays for further import
	$customStylesheets_array = array("back-link.style.css", "application_private.css", "loader.style.css");
	$customScripts_array = array("custom_validation.js", "validate_text.js", "input_masking.js", "loader.js");
?>

<!-- BEGINNING OF HTML -->
<!DOCTYPE html>
<html lang="en">
	<?php require_once($head_ldp); ?>
<body>
	<!-- The loader -->
	<div id="loader_div" class="loader">
		<img src="<?=$spinner_src?>" alt="spinner">
	</div>
	<!-- The 'Back' link -->
	<?php require_once($backLink_ldp); ?>
	<br></br>
	<section id="section-form">
		<div class="mt-5">
			<!-- Creating and filling teacher application form -->
			<form>
				<div class="container">
					<!-- a row for h2 -->
					<div class="row my-4 py-2">
						<h2>Please fill all necessary fields and press 'Register'!</h2>
					</div>
					<!-- first form sections row (name, surname, phone number) -->
					<div class="row py-3">
						<div class="col-xs-12 col-sm-8 col-md-4">
						    <label for="name-field">Name</label>
						    <input type="text" class="form-control" required="true" data-error-field="error_1" id="name-field" pattern="[A-Z]{1}[a-z]{0,20}">
							<small id="error_1" class="form-text text-danger d-none">Please write your name, without spaces</small>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-4">
						    <label for="surname-field">Surname</label>
						    <input type="text" class="form-control" required="true" data-error-field="error_2" id="surname-field"  pattern="[A-Z]{1}[a-z]{0,20}" >
						    <small id="error_2" class="form-text text-danger d-none">Please write your surname, without spaces</small>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-4">
						    <label for="phone-number-field">Contact phone number</label>
						    <input type="text" class="form-control" required="true" data-error-field="error_3" id="phone-number-field" placeholder="+7 (___) ___-__-__" data-slots="_" pattern="[+]7 [(]\d{3}[)] \d{3}-\d{2}-\d{2}">
						    <small id="error_3" class="form-text text-danger d-none">Please write valid phone number</small>
						</div>
					</div>
					<hr>
					<!-- second form sections row (additional phone number, level of education, gender) -->
					<div class="row py-3">
						<div class="col-xs-12 col-sm-8 col-md-4">
						    <label for="email-field">Email address</label>
						    <input type="text" maxlength="50" class="form-control" required="true" data-error-field="error_4"  id="email-field" aria-describedby="email_help" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$">
						    <small id="email_help" class="form-text text-muted">We'll use your email to inform you.</small>
						    <small id="error_4" class="form-text text-danger d-none">Please write correct email</small>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-4">
	    				    <label for="lvl-of-ed-field">Your level of education</label>
	    				    <select class="form-control" id="lvl-of-ed-field">
	    				    	<option data-surcharge = "0" value="Undetermined">Undetermined</option>
	    				    	<option data-surcharge = "0" value="Elementary">Elementary</option>
	    				    	<option data-surcharge = "0" value="Pre-Intermediate">Pre-Intermediate</option>
	    				    	<option data-surcharge = "0" value="Upper-intermediate">Upper-intermediate</option>
	    				    	<option data-surcharge = "0" value="Intermediate">Intermediate</option>
	    				    	<option data-surcharge = "0" value="Advanced">Advanced</option>
	    				    </select>								
						</div>	
						<div class="col-xs-12 col-sm-8 col-md-4">
	    				    <label for="gender-field">Your gender</label>
	    				    <select class="form-control" id="gender-field">
	    				    	<option value="Male">Male</option>
	    					    <option value="Female">Female</option>
	    					    <option value="Other">Other</option>
	    				    </select>								
						</div>	
					</div>
					<hr>
					<!-- third form sections row (information about classes schedule) -->
					<div class="row py-3">
						<div class="col-12 col-lg-7">
							<?php 
							// Fetching data about time sessions of classes from the moday schedule table (for example)
							$sql = "SELECT `session1`,`session2`,`session3`,`session4`,`session5`,`session6` FROM appletree_schedule.monday WHERE `id` = 0";
							$stmt = $pdo->query($sql);
							$sessionColumn = $stmt->fetch(PDO::FETCH_NUM);
							 ?>
							<!-- Timetable for Monday -->
							<table class="my-5 table table-striped border text-center">
								<caption><small> <i>Note:</i> This is a timetable for Monday as an example. Details may change for different days.</small></caption>
							  <thead>
							    <tr>
							      <th scope="col">Time session name</th>
							      <th scope="col">Time</th>
							    </tr>
							  </thead>
							  <tbody>
							    <?php foreach ($sessionColumn as $key=>$value): ?>
							    	<tr class="tr tr-<?=$key?>">
							    		<th class="font-weight-normal" scope="col"><?=$key>=3?"Evening- ".($key-2):"Morning-".($key+1)?></th>
							    		<th class="font-weight-normal" scope="col"><?=$value?></th>
							        </tr>
							    <?php endforeach; ?>
							  </tbody>
							</table>
						</div>
						<div class="col py-4 flex-lg-column">
							<div class="col-xs-12 col-md-6 col-lg mb-5">
								<label for="birthyear-field">Birth year</label>
						    	<input type="text" class="form-control" id="birthyear-field"  pattern="^([1][9][2-9]|[2][0,1][0-9])\d{1}$" required="true" data-error-field="error_year">
						    	<small id="error_year" class="form-text text-danger d-none">Please write valid year</small>
							</div>
						    <div class="col">
						    	<label for="preferences-field">Please explain your desired timetable so we can decide to add you to one of the existing classes</label>
								<textarea required="true" class="form-control" id="preferences-field" aria-describedby="infoHelp" placeholder="Maximum - 700 characters" maxlength="700" style="resize: none;" rows="5" ></textarea>
								<small id="infoHelp" class="form-text text-muted">
									You can enter the most convenient days of week and time for your classes, we will later contact you to inform regarding available seats.
								</small>
						    </div>
						</div>
					</div>
					<div class="row">
						
						
					</div>
					<hr>
					<!-- fourth form sections row (supplementary info) -->
					<div class="row py-3">
						<div class="col-12 col-lg py-4">
							<!-- The price list table -->
							<table class="table table-striped text-center border">
								<tbody>

								<?php 
								// Fetching data about prices for lessons from the 'price_list' table
								$sql = "SELECT `card_header`,`price`,`condition`,`note` FROM appletree_general.price_list";
								$stmt = $pdo->query($sql);
								while ($row = $stmt->fetch(PDO::FETCH_OBJ)):
								?>
								   	<tr>
							    		<td class="font-weight-normal"><?= $row->card_header ?></td>
							    		<td class="font-weight-normal"><em><?= $row->condition ?></em></td>
							    		<td class="lead"><?= $row->price ?> tenge/lesson</td>
							        </tr>
								    <tr>
							       		<td class="font-weight-normal text-muted pt-0" colspan="3">
							       			<small><em><?= $row->note ?></small></em>
							       		</td>
							        </tr>

								<?php endwhile; ?>
								
								</tbody>
							</table>
						</div>
						<div class="col-12 col-md-10 col-lg-4 mb-4">
							<h5 class="my-3">Supplementary information</h5>
							<br>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="whatsapp-field">
								<label class="form-check-label" for="whatsapp-field">
									I have WhatsApp registered to the given phone number
									<br>
									<small class="text-muted">(we will use it to contact to you)</small>
								</label>
							</div>
							<br>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" checked="true" value="" id="test-field">
								<label class="form-check-label" for="test-field">
									I would like to test my English
									<br>
									<small class="text-muted">(compulsory if "Undetermined" is selected)</small>
								</label>
							</div>
						</div>
					</div>
					<hr>
					<!-- div for buttons -->
					<div class="row d-flex justify-content-center py-3">
						<button type="button" id="submit" class="btn btn-primary my-2" style="margin-right: 5%; min-width: 150px;">
							Register!
						</button>
						<button type="reset" class="btn btn-secondary my-2 px-4">
							Clear input fields
						</button>
					</div>
				</div>
				<br></br>
	 		</form>
	 	</div>
	</section>
</body>
<!-- Importing jQuery and custom outsource scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	// Attaching 'click' function to the 'Register!' button via id and enabling clickable lists
	$(document).ready(function(){
		fix_loader("loader_div");
		$("#submit").click(submit);
	})
	
	function submit()
	{	
		// Form is submitted if every field passes validation (through imported function)
		if(validate_text($("input[type='text']")))
		{	
			// An array to keep the values of optional checkbox/radio input fields
			let opt_check = new Array(2);
			// Assign values for each of the checkbox/radio fields. Values are either 1 or 0,
			// since the input can only be True or False
			opt_check[0] = $("#checkbox-1").prop("checked")? 1:0;
			opt_check[1] = ($("#lvl-of-ed-field").val()=="Undetermined")? 1 : ($("#checkbox-2").prop("checked")? 1:0);
			// Define a new variable for a concatenated string from the 'convertLists' function
			// and actual provided preferences in the 'textarea' element
			let preferences = $("#preferences-field").val();
			// Sends sends data and either redirects the user or displays an alert according to the outcome
			$.ajax({
				url: "<?= $appProcessing_url ?>",
				type: 'POST',
				cache: false,
				data: {
					'name':$("#name-field").val(),
					'surname':$("#surname-field").val(),
					'phone_number':$("#phone-number-field").val(),
					'email':$("#email-field").val(),
					'ed_lvl':$("#lvl-of-ed-field").val(),
					'gender':$("#gender-field").val(),
					'birth_year':$("#birthyear-field").val(),
					'preferences':preferences,
					'opt_checkbox1':opt_check[0],
					'opt_checkbox2':opt_check[1],
					'application_type':'student',
					'group_ls':1
				},
				beforeSend: function() {
					$("#loader_div").removeClass("hidden");
				},
				success: function(data){
					if (data == 0)
					{
						var result = confirm("Your registration is successul! Press OK to return to main page.")
						if (result)
							window.location.replace("<?=$index_url?>");
						return;
					}
					else
					{
						alert(data);
						return;
					}
				}
			})

			$("#loader_div").addClass("hidden");
		}
	}
</script>
<?php foreach ($customScripts_array as $value){	echo "<script src='$js$value'></script>".PHP_EOL; } ?>
</html> 
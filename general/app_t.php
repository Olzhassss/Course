<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php'); 
	$customStylesheets_array = array("back-link.style.css");
	$customScripts_array = array("validate_text.js", "input_masking.js");
?>

<!-- BEGINNING OF HTML -->
<!DOCTYPE html>
<html lang="en">
	<?php require_once($head_pathname); ?>
<body>
	<?php require_once($backLink_pathname); ?>
	<br></br>
	<section id="section-form">
		<div class="mt-5">
			<!-- Creating and filling teacher application form -->
			<form>
				<div class="container">
					<!-- a row for h2 -->
					<div class="row">
						<h2 class="alert">Please fill necessary fields and press 'Register'!</h2>
					</div>
					<!-- first form sections row (name, surname, email) -->
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-4">
						    <label for="name-field">Name</label>
						    <input type="text" class="form-control" required="true" error-field="error_1" id="name-field" pattern="^[A-Z]{1}[a-z]{0,20}$">
							<small id="error_1" class="form-text text-danger d-none">Please write your name, without spaces</small>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-4">
						    <label for="surname-field">Surname</label>
						    <input type="text" class="form-control" required="true" error-field="error_2" id="surname-field"  pattern="^[A-Z]{1}[a-z]{0,20}$" >
						    <small id="error_2" class="form-text text-danger d-none">Please write your surname, without spaces</small>
						</div>
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
						    <label for="email-field">Email address</label>
						    <input type="text" class="form-control" required="true" error-field="error_3" id="email-field" pattern="^[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$" aria-describedby="emailHelp">
						    <small id="emailHelp" class="form-text text-muted">We'll use your email to inform you.</small>
						    <small id="error_3" class="form-text text-danger d-none">Please write correct email</small>
						</div>
					</div>
					<hr>
					<!-- second form sections row (phone number, working experience, max level of education) -->
					<div class="row">
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
						    <label for="phone-number-field">Contact phone number</label>
						    <input type="text" class="form-control" required="true" error-field="error_4" id="phone-number-field" placeholder="+7 (___) ___-__-__" data-slots="_" pattern="[+]7 [(]\d{3}[)] \d{3}-\d{2}-\d{2}">
						    <small id="error_4" class="form-text text-danger d-none">Please write valid phone number</small>
						</div>
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
						    <label for="experience-field">Working Experience (in years)</label>
						    <input type="text" class="form-control" required="true" error-field="error_5" id="experience-field" pattern="^[0-9]{1,2}$">
						    <small id="error_5" class="form-text text-danger d-none">Please write valid working experience</small>
						</div>
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
		  					    <label for="lvl-of-ed-field">Desired level of education</label>
		  					    <select class="form-control" id="lvl-of-ed-field">
		  					        <option value="Elementary">Elementary</option>
		  					        <option value="Pre-Intermediate">Pre-Intermediate</option>
		  					        <option value="Upper-intermediate">Upper-intermediate</option>
		  					        <option value="Intermediate">Intermediate</option>
		  					        <option value="Advanced">Advanced</option>
		  					    </select>								
						</div>	
					</div>
					<hr>
					<!-- third form sections row (gender and additional question) -->
					<div class="row d-flex justify-content-between">
						<div class="col-xs-12 col-sm-6 col-md-4 mb-2">
							<label for="gender-field">Your gender</label>
	    					<select class="form-control" id="gender-field">
	    						<option value="Male">Male</option>
	    					    <option value="Female">Female</option>
	    					    <option value="Other">Other</option>
	    					</select>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-6">
							<h6>Do you have own methodic material prepared for teaching?</h6>
							<div class="form-check">
								<input class="form-check-input" name="opt_radio" type="radio" id="radio-1" value="Yes" required="true">
								<label class="form-check-label" for="radio-1">Yes</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" name="opt_radio" type="radio" id="radio-2" value="No" checked="true">
								<label class="form-check-label" for="radio-2">No</label>
							</div>
						</div>
					</div>
					<hr>
					<!-- fourth form sections row (short text field, supplementary info) -->
					<div class="row">
						<div class="form-group col-12 col-md-5">
						    <label for="additional-info"><h5>Tell us about youself (not neccessary)</h5></label>
							<textarea class="form-control" id="additional-info" aria-describedby="infoHelp" placeholder="Maximum - 2500 symbols" maxlength="2500" style="resize: none;" rows="5" ></textarea>
							<small id="infoHelp" class="form-text text-muted">
								Here you can include some details about your personality or career achievements or any other details
							</small>
						</div>
						<div class="col-1 d-none d-lg-block" style="height: inherit; border-right: 1px solid rgba(0,0,0,.1)">
						</div>
						<div class="col">
							<h5>Supplementary information</h5>
							<br>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="checkbox-1">
								<label class="form-check-label" for="checkbox-1">
									I have What'sApp registered to the given phone number
								</label>
							</div>
							<br>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="checkbox-2">
								<label class="form-check-label" for="checkbox-2">
									I have an opportunity to work on Sundays
								</label>
							</div>
						</div>
					</div>
					<hr>
					<!-- div for buttons -->
					<div class="row d-flex justify-content-center">
						<button type="button" id="submit" class="btn btn-primary" style="margin-right: 5%; min-width: 150px;">
							Register!
						</button>
						<button type="Reset" class="btn btn-secondary">
							Reset application form
						</button>
					</div>
					<!-- div for additional info in nav tabs -->
					<div class="mt-5 pt-4">
						<nav>
						  <div class="nav nav-tabs row" id="nav-tab" role="tablist">
						    <a class="nav-item nav-link active col-12 col-sm-4 col-md-2" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">About your working schedule</a>
						    <a class="nav-item nav-link col-12 col-sm-4 col-md-2" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Emergency working conditions</a>
						    <a class="nav-item nav-link col-12 col-sm-4 col-md-2" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Supportive application skills</a>
						  </div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
						  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">..1.</div>
						  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">..2.</div>
						  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">..3.</div>
						</div>				
					</div>
				</div>
				<br></br>
			</form>
		</div>
	</section>
</body>
<!-- Importing jQuery and custom outsource scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
	// Attaching 'click' function to the 'Register!' button via id and enabling clickable lists
	$(document).ready(function(){
		$("#submit").click(submit);
	})

	function submit()
	{
		// 
		if(validate_text($("input[type='text']")))
		{
			let opt_radio = new Array(3);
			opt_radio[0] = $("#checkbox-1").prop("checked")? 1:0;
			opt_radio[1] = $("#checkbox-2").prop("checked")? 1:0;
			opt_radio[2] = ($('input[name="opt_radio"][value="Yes"]').is(':checked'))? 1:0;
			// Sends password and login values to 'authorization.php' and
			// either redirects the user or displays an error according to the outcome
			$.ajax({
				url: '../administration/application.php',
				type: 'POST',
				cache: false,
				data: { 'name':$("#name-field").val(), 'surname':$("#surname-field").val(), 'phone_number':$("#phone-number-field").val(),
						 'email':$("#email-field").val(), 'ed_lvl':$("#lvl-of-ed-field").val(), 'exp':$("#experience-field").val(),
						 'summary':$("#additional-info").val(), 'application_type':'teacher', 'gender':$("#gender-field").val(),
						 'opt_radio1':opt_radio[0], 'opt_radio2':opt_radio[1], 'opt_radio3':opt_radio[2] },
				beforeSend: function() {
					$("#loader_div").removeClass("hidden");
				},
				success: function(data){
					console.log(data);	
					if (data == 0)
					{
						var result = confirm("Your registration is successul! Press OK to return to main page.")
						if (result)
							window.location.replace("<?=$index?>");
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
<?php
foreach ($customScripts_array as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>
</html>
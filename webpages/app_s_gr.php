<?php 
	$temp = "..";
	include_once('../root.php');
	$custom_stylesheets = array("back-link.style.css");
?>

<!-- BEGINNING OF HTML -->
<!DOCTYPE html>
<html lang="en">
	<?php include_once($head_uri); ?>
<body>
	<section id="section-back-link">
		<a class="nav-link" href="app_s0.php" id="back-link"><-Back</a>
	</section>
	<br></br>
	<section id="section-form">
			<div class="mt-5">
				<!-- Creating and filling teacher application form -->
				<form method="post" action="">
					<div class="container">
						<!-- a row for h2 -->
						<div class="row my-4 py-2">
							<h2>Please fill all necessary fields and press 'Register'!</h2>
						</div>
						<!-- first form sections row (name, surname, phone number) -->
						<div class="row py-3">
							<div class="form-group col-xs-12 col-sm-8 col-md-4">
							    <label for="name-field">Name</label>
							    <input type="text" class="form-control" id="name-field" name="name-field" required="true" pattern="[A-Z][a-z]{3,20}">
							    <small id="error_1" class="form-text text-muted">We'll use your email to inform you.</small>
							</div>
							<div class="form-group col-xs-12 col-sm-8 col-md-4">
							    <label for="surname-field">Surname</label>
							    <input type="text" required="true" class="form-control" id="surname-field"  pattern="[A-Z][a-z]{3,20}" >
							    <small id="error_2" class="form-text text-muted">We'll use your email to inform you.</small>
							</div>
							<div class="form-group col-xs-12 col-sm-8 col-md-4">
							    <label for="phone-number-field">Phone number</label>
							    <input type="text" class="form-control" id="phone-number-field" required="true" pattern="\d{10}">
							    <small id="error_3" class="form-text text-muted">We'll use your email to inform you.</small>
							</div>
						</div>
						<hr>
						<!-- second form sections row (additional phone number, level of education, gender) -->
						<div class="row py-3">
							<div class="form-group col-xs-12 col-sm-8 col-md-4">
							    <label for="email-field">Email address</label>
							    <input type="text" class="form-control"  id="email-field" aria-describedby="email_help" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$" required="true">
							    <small id="email_help" class="form-text text-muted">We'll use your email to inform you.</small>
							    <small id="error_4" class="form-text text-danger d-none">Please write correct email</small>
							</div>
							<div class="form-group col-xs-12 col-sm-8 col-md-4">
		    				    <label for="lvl-of-ed-field">Your level of education</label>
		    				    <select class="form-control" id="lvl-of-ed-field">
		    				    	<option>Undeterminent</option>
		    				        <option>Elementary</option>
		    				        <option>Pre Intermediate</option>
		    				        <option>Upper intermediate</option>
		    				        <option>Intermediate</option>
		    				        <option>Advanced</option>
		    				    </select>								
							</div>	
							<div class="form-group col-xs-12 col-sm-8 col-md-4">
		    				    <label for="gender">Your gender</label>
		    				    <select class="form-control" id="gender">
		    				    	<option>Male</option>
		    				        <option>Female</option>
		    				        <option>Other</option>
		    				    </select>								
							</div>	
						</div>
						<hr>
						<!-- third form sections row (supplementary info) -->
						<div class="row py-3">
							<div class="col-xs-12 col-sm-8 col-md-4">
								<h5>Supplementary information</h5>
								<br>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="whatsapp">
									<label class="form-check-label" for="whatsapp">
										I have What'sApp registered to the given phone number
									</label>
								</div>
								<br>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="test">
									<label class="form-check-label" for="test">
										I would like to test my English <br>(automatic if "Undeterminent" is selected)
									</label>
								</div>
							</div>
						</div>
						<hr>
						<!-- div for buttons -->
						<div class="row d-flex justify-content-center py-3">
							<button type="button" class="btn btn-primary" style="margin-right: 5%; min-width: 150px;">
								Register!
							</button>
							<button type="Reset" class="btn btn-secondary">
								Reset application form
							</button>
						</div>
						<!-- div for additional info in nav tabs -->
						<div class="mt-5">
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
	<!-- connecting outsource scripts for Bootstrap and custom scripts -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="js/form-validation.js"></script>
</html>
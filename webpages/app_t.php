<!-- NOTES:
	THE NAME OF VARIABLES USED TO IMPORT/REDIRECT
	> BACK LINK - $back_link
	> HEAD TAG - $head_uri
	> ROOT FILE ADDRESS - "../root.php" ($root_uri)
-->
<?php 
	$temp = "..";
	include_once("../root.php");
	$custom_stylesheets = array("back-link.style.css");
?>

<!-- BEGINNING OF HTML -->
<!DOCTYPE html>
<html lang="ru">
	<?php include_once($head_uri); ?>
<body>
	<section id="section-back-link">
		<a class="nav-link" href="<?=$back_link;?>" id="back-link"><-Back</a>
	</section>
	<br></br>
	<section id="section-form">
		<!-- div wrapping the entire form -->
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
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
						    <label for="name-field">Name</label>
						    <input type="text" class="form-control" id="name-field" name="name_field" required="true" pattern="[A-Z][a-z]{1,}">
						</div>
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
						    <label for="surname-field">Surname</label>
						    <input type="text" required="true" class="form-control" id="surname-field"  pattern="[A-Z][a-z]{1,}" >
						</div>
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
						    <label for="email-field">Email address</label>
						    <input type="text" class="form-control"  id="email-field" aria-describedby="emailHelp" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$" required="true">
						    <small id="emailHelp" class="form-text text-muted">We'll use your email to inform you.</small>
						</div>
					</div>
					<hr>
					<!-- second form sections row (phone number, working experience, max level of education) -->
					<div class="row">
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
						    <label for="phone-number-field">Phone number</label>
						    <input type="text" class="form-control" id="phone-number-field" required="true" pattern="\d{10}">
						</div>
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
						    <label for="experience-field">Working Experience (in years)</label>
						    <input type="text" class="form-control" id="experience-field" pattern="\d{1,2}" required="true">
						</div>
						<div class="form-group col-xs-12 col-sm-8 col-md-4">
		  					    <label for="lvl-of-ed-field">Max level of education</label>
		  					    <select class="form-control" id="lvl-of-ed-field">
		  					        <option>Elementary</option>
		  					        <option>Pre Intermediate</option>
		  					        <option>Upper intermediate</option>
		  					        <option>Intermediate</option>
		  					        <option>Advanced</option>
		  					    </select>								
						</div>	
					</div>
					<hr>
					<!-- third form sections row (gender and additional question) -->
					<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6 mb-2">
						<h6>Gender</h6>
						<div class="form-check">
							<input class="form-check-input" name="radio-2" type="radio" id="gender-1" value="male" required="true">
							<label class="form-check-label" for="gender-1">Male</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="radio-2" type="radio" id="gender-2" value="female">
							<label class="form-check-label" for="gender-2">Female</label>
						</div>	
						<div class="form-check">
							<input class="form-check-input" name="radio-2" type="radio" id="gender-3" value="other">
							<label class="form-check-label" for="gender-3">Other</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-8 col-md-6">
						<h6>Do you have own methodic material prepared for teaching?</h6>
						<div class="form-check">
							<input class="form-check-input" name="radio-1" type="radio" id="methodology-radio-1" value="positive" required="true">
							<label class="form-check-label" for="methodology-radio-1">Yes</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="radio-1" type="radio" id="methodology-radio-2" value="negative" >
							<label class="form-check-label" for="methodology-radio-2">No</label>
						</div>
					</div>
					</div>
					<hr>
					<!-- fourth form sections row (short text field, supplementary info) -->
					<div class="row">
					<div class="form-group col-12 col-md-5">
					    <label for="additional-info"><h5>Tell us about youself (not neccessary)</h5></label>
						<textarea class="form-control" id="additional-info" aria-describedby="infoHelp" placeholder="Maximum - 500 symbols" maxlength="500" style="resize: none;" rows="5" ></textarea>
						<small id="infoHelp" class="form-text text-muted">
							Here you can include some details about your personality or career achievements
						</small>
					</div>
					<div class="col-1 d-none d-lg-block" style="height: inherit; border-right: 1px solid rgba(0,0,0,.1)">
					</div>
					<div class="col">
						<h5>Supplementary information</h5>
						<br>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="have-whatsapp" id="whatsapp">
							<label class="form-check-label" for="whatsapp">
								I have What'sApp registered to the given phone number
							</label>
						</div>
						<br>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="work-on-sunday" id="sunday">
							<label class="form-check-label" for="sunday">
								I have an opportunity to work on Sundays
							</label>
						</div>
					</div>
					</div>
					<hr>
					<!-- div for buttons -->
					<div class="row d-flex justify-content-center">
					<button type="button" id="submit_button" class="btn btn-primary" style="margin-right: 5%; min-width: 150px;">
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
	<!-- connecting outsource scripts for Bootstrap and custom scripts -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="js/form-validation.js"></script>
</html>
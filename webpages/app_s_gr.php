<!-- NOTES:
	THE NAMES OF VARIABLES USED
	> 'BACK' LINK HREF - $back_link
	> HEAD TAG FILE ADDRESS - $head_uri
	> CUSTOM STYLESHEETS ARRAY (files' names) - $custom_stylesheets
	> CUSTOM SCRIPTS ARRAY (files' names) - $custom_scripts
    > CUSTOM STYLES (CSS) - $custom_styles
	> PAGE TITLE (string) - $title
	> CUSTOM SCRIPTS FOLDER ADDRESS - $js
	> 'ROOT' FILE ADDRESS - "../root.php" ($root_uri)
	> ROOT DIRECTORY PREFIX - $temp
-->

<?php 
	$temp = "..";
	include_once('../root.php');
	$custom_stylesheets = array("back-link.style.css", "application_private.css");
	$custom_scripts = array("custom_validation.js", "validate_text.js", "input_masking.js");
?>

<!-- BEGINNING OF HTML -->
<!DOCTYPE html>
<html lang="en">
	<?php include_once($head_uri); ?>
<body>
	<section id="section-back-link">
		<a class="nav-link" href="<?=$back_link;?>" id="back-link"><-Back</a>
	</section>
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
						    <input type="text" class="form-control" required="true" error-field="error_1" id="name-field" pattern="[A-Z]{1}[a-z]{0,20}">
							<small id="error_1" class="form-text text-danger d-none">Please write your name, without spaces</small>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-4">
						    <label for="surname-field">Surname</label>
						    <input type="text" class="form-control" required="true" error-field="error_2" id="surname-field"  pattern="[A-Z]{1}[a-z]{0,20}" >
						    <small id="error_2" class="form-text text-danger d-none">Please write your surname, without spaces</small>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-4">
						    <label for="phone-number-field">Contact phone number</label>
						    <input type="text" class="form-control" required="true" error-field="error_3" id="phone-number-field" placeholder="+7 (___) ___-__-__" data-slots="_" pattern="[+]7 [(]\d{3}[)] \d{3}-\d{2}-\d{2}">
						    <small id="error_3" class="form-text text-danger d-none">Please write valid phone number</small>
						</div>
					</div>
					<hr>
					<!-- second form sections row (additional phone number, level of education, gender) -->
					<div class="row py-3">
						<div class="col-xs-12 col-sm-8 col-md-4">
						    <label for="email-field">Email address</label>
						    <input type="text" class="form-control" required="true" error-field="error_4"  id="email-field" aria-describedby="email_help" pattern="[a-z0-9._%+-]+@[a-z.-]+\.[a-z]{2,}$">
						    <small id="email_help" class="form-text text-muted">We'll use your email to inform you.</small>
						    <small id="error_4" class="form-text text-danger d-none">Please write correct email</small>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-4">
	    				    <label for="lvl-of-ed-field">Your level of education</label>
	    				    <select class="form-control" id="lvl-of-ed-field">
	    				    	<option surcharge = "0">Undeterminent</option>
	    				        <option surcharge = "0">Elementary</option>
	    				        <option surcharge = "0">Pre Intermediate</option>
	    				        <option surcharge = "0">Intermediate</option>
	    				        <option surcharge = "0">Upper intermediate</option>
	    				        <option surcharge = "0">Advanced</option>
	    				    </select>								
						</div>	
						<div class="col-xs-12 col-sm-8 col-md-4">
	    				    <label for="gender-field">Your gender</label>
	    				    <select class="form-control" id="gender-field">
	    				    	<option>Male</option>
	    				        <option>Female</option>
	    				        <option>Other</option>
	    				    </select>								
						</div>	
					</div>
					<hr>
					<!-- third form sections row (information about classes schedule) -->
					<div class="row py-3">
						<div class="col-12 col-lg-7">
							<table class="my-5 table table-striped border text-center">
							  <thead>
							    <tr>
							      <th scope="col">Time session name</th>
							      <th scope="col">Time</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <td></td>
							      <td></td>
							    </tr>
							  </tbody>
							</table>
						</div>
						<div class="col-xs-12 col-md-6 col-lg py-4">
						    <label for="birthyear-field">Birth year</label>
						    <input type="text" class="form-control" id="birthyear-field"  pattern="\d{4}" required="true" error-field="error_year">
						    <small id="error_year" class="form-text text-danger d-none">Please write valid year</small>
						</div>
					</div>
					<div class="row">
						
						
					</div>
					<hr>
					<!-- fourth form sections row (supplementary info) -->
					<div class="row py-3">
						<div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 mb-4">
							<h5 class="my-3">Supplementary information</h5>
							<br>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="whatsapp-field">
								<label class="form-check-label" for="whatsapp-field">
									I have What'sApp registered to the given phone number
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
									<small class="text-muted">(compulsory if "Undeterminent" is selected)</small>
								</label>
							</div>
						</div>
						<div class="col-12 col-md-6 py-4">
							<div class="card float-right">
								<div class="card-body">
									<p class="lead" style="font-size: 2rem;">
										Extra fee for a weekday is <span id="fee_weekday">0</span>tg
										<br>
										And for a weekend is <span id="fee_weekend">0</span>tg
									</p>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<!-- div for buttons -->
					<div class="row d-flex justify-content-center py-3">
						<button type="button" id="submit" class="btn btn-primary my-2" style="margin-right: 5%; min-width: 150px;">
							Register!
						</button>
						<button type="reset" class="btn btn-secondary my-2">
							Reset application form
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
		if(set_click_listener("li_weekday") && set_click_listener("li_time"))
			$("#submit").click(submit);
		else
			$("#submit").attr("disabled", "true");
	})
	
	function submit()
	{
		// Calling functions in order to do validation
		validate_list($(".li_time"), 1);
		validate_list($(".li_weekday"), 2);
		if(validate_text($("input[type='text']")))
			validate_birthYear("birthyear-field");
	}
</script>
<script>
	/*function set_payment(list_class, value, text_el_id, sum_el_id)
	{
		var list = $("." + list_class);
		// Input arguments validation
		if(!(list.length > 0)|| !Number.isInteger(value))
		{
			console.log("The 'set_payment' function false arguments!")
			return false;
		}
		if (typeof text_el_id === undefined)
		{
			console.log("The 'set_payment' function false arguments! Text element id required!")
			return false;
		}
		list.each( function(){
			this.addEventListener('click', function(){add_payment(list, value, text_el_id, sum_el_id);});
		})
	}
	function add_payment(list, value, text_el_id, special_el_id)
	{
		
		var payment = parseInt($("#" + text_el_id).text(),10);
		var sum
		if (!Number.isInteger(payment))
		{
			console.log("The'add_payment' function false arguments - text is not an integer!");
			return false;
		}
		if (list[i].id === special_el_id && list[i].classList.contains("active")) {}
		for(var i=0; i<list.length; i++)
		{
			if (list[i].id === special_el_id && list[i].classList.contains("active"))
			{
				sum+= value*list.length;
			}

		}
		if ($("#" + object_id).hasClass("active"))
		{
			if (object_id === special_el_id)
			{
				value*= 1;
			}
			payment+= value;
		}
		else
		{
			payment-=value;
		}
		$("#" + text_el_id).text(payment);
	}*/
</script>
<!-- Importing outsource scripts -->
<?php
foreach ($custom_scripts as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>
</html> 
<?php 
	$temp = "..";
	include_once('../root.php');
	$custom_stylesheets = array("back-link.style.css", "application_private.css");
	$custom_scripts = array("custom_validation.js", "clickable_lists.js", "validate_list.js", "validate_text.js", "input_masking.js");
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
							<h5 class="my-3">Please select the days of week (at least 2) you would like to have lessons</h5>
							<!-- The begining of 'lesson day' field div -->
							<div class="row mt-3">
								<ul class="d-flex flex-wrap list-group list-group-horizontal-md p-3">
									<li class="list-group-item li_weekday hoverable active" id="weekday_all" exclusive= "true" error-field= "error_weekday">
										<p>Everyday</p>
										<input type="checkbox"  class="d-none">
									</li>
									<li class="list-group-item li_weekday hoverable" id="weekday_1">
										<p>Monday</p>
										<input type="checkbox"  class="d-none">
									</li>
									<li class="list-group-item li_weekday hoverable" id="weekday_2" >
										<p>Tuesday</p>
										<input type="checkbox" class="d-none">
									</li>
									<li class="list-group-item li_weekday hoverable" id="weekday_3">
										<p>Wednesday</p>
										<input type="checkbox"  class="d-none">
									</li>
								</ul>
								<ul class="d-flex flex-wrap list-group list-group-horizontal-md p-3">
									<li class="li_weekday hoverable list-group-item" id="weekday_4">
										<p>Thursday</p>
										<input type="checkbox"  class="d-none">
									</li>
									<li class="li_weekday hoverable list-group-item" id="weekday_5">
										<p>Friday</p>
										<input type="checkbox"  class="d-none">
									</li>
									<li class="li_weekday hoverable list-group-item" id="weekday_6">
										<p>Saturday</p>
										<input type="checkbox"  class="d-none">
									</li>
									<li class="li_weekday hoverable list-group-item" id="weekday_7" >
										<p>Sunday</p>
										<input type="checkbox" class="d-none">
									</li>
								</ul>
							</div>
							<!-- The end of 'lesson day' field div -->
							<small id="error_weekday" class="form-text text-danger d-none">You should choose 'Everyday' or at least 2 days!</small>
						</div>
						<div class="col-xs-12 col-md-6 col-lg py-4">
						    <label for="birthyear-field">Birth year</label>
						    <input type="text" class="form-control" id="birthyear-field"  pattern="\d{4}" required="true" error-field="error_year">
						    <small id="error_year" class="form-text text-danger d-none">Please write valid year</small>
						</div>
					</div>
					<div class="row">
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
						<div class="col-sm-12 col-md-12 col-lg-5 mt-4 mt-lg-0">
							<h5 class="my-3">Please choose convenient time sessions (you can choose many)</h5>
							<!-- The begining of 'lesson time' field div -->
	    				    <div class="text-center my-3">
	    				    	<div class="d-flex flex-wrap justify-content-center">
	    				    	    <div class="card m-1 m-md-3 m-lg-1 mx-sm-2 col-sm-5 col-md-3 col-lg-5 p-3  li_time hoverable"  id="time_1" error-field="error_time">
	    				    	      <p class="card-text"> Morning-1</p>
	    				    	    </div>
	    				    	    <div class="card m-1 m-md-3 m-lg-1 mx-sm-2 col-sm-5 col-md-3 col-lg-5 p-3  li_time hoverable"  id="time_2">
	    				    	      <p class="card-text"> Morning-2</p>
	    				    	    </div>
	    				    	    <div class="card m-1 m-md-3 m-lg-1 mx-sm-2 col-sm-5 col-md-3 col-lg-5 p-3  li_time hoverable"  id="time_3">
	    				    	      <p class="card-text"> Morning-3</p>
	    				    	    </div>
	    				    	    <div class="card m-1 m-md-3 m-lg-1 mx-sm-2 col-sm-5 col-md-3 col-lg-5 p-3  li_time hoverable"  id="time_4">
	    				    	      <p class="card-text"> Evening-1</p>
	    				    	    </div>
	    				    	    <div class="card m-1 m-md-3 m-lg-1 mx-sm-2 col-sm-5 col-md-3 col-lg-5 p-3  li_time hoverable"  id="time_5">
	    				    	      <p class="card-text"> Evening-2</p>
	    				    	    </div>
	    				    	    <div class="card m-1 m-md-3 m-lg-1 mx-sm-2 col-sm-5 col-md-3 col-lg-5 p-3  li_time hoverable" id="time_6">
	    				    	      <p class="card-text"> Evening-3</p>
	    				    	    </div>
	    				    	</div>
	    				    </div>
	    				    <div class="text-center d-flex justify-content-center">
	    				    	<div class="li_time hoverable card active w-50 p-3" id="time_any" exclusive="true">
										<p>Any time</p>
								</div>
	    				    </div>
	    				    <!-- The begining of 'lesson time' field div -->
	    				    <small id="error_time" class="form-text text-danger d-none">You should choose at least one option!</small>
						</div>
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
						<button type="Reset" class="btn btn-secondary my-2">
							Reset application form
						</button>
					</div>
				</div>
				<br></br>
	 		</form>
	 	</div>
	</section>
	
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	// Attaching 'click' function to the 'Register!' button via id and enabling clickable lists
	$(document).ready(function(){
		if(set_click_listener("li_weekday") && set_click_listener("li_time"))
		//set_payment("li_weekday", 1000, "fee-span", "weekday_all");
			$("#submit").click(submit);
		else
			$("#submit").attr("disabled", "true");
	})
	
	function submit()
	{
		// Calling functions in order to do validation
		validate_list($(".li_time"), 1);
		validate_birthYear("birthyear-field");
		validate_list($(".li_weekday"), 2);
		validate_text($("input[type='text']"));
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
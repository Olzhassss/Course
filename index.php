<!-- NOTES:
	THE NAME OF VARIABLES USED TO IMPORT
	> HEADER - $header_uri
	> FOOTER - $footer_uri
	> HEAD TAG - $head_uri


-->

<?php
	include_once('./root.php');
	//session_start();
	//$username = "";
	$title = 'AppleTree main page';
	$custom_stylesheets = array("header.style.css", "footer.style.css", "app_main.style.css");
	
?>
<!DOCTYPE html>
<html>
<?php include_once($head_uri); ?>
<body>
	<!--Including head and header via PHP -->
	<?php include_once($header_uri); ?>

	<section id="section-home">
		<div id="carousel-1" class="carousel slide"  data-ride="carousel">
		  <div class="carousel-inner">
		    <div data-interval="3000" class="carousel-item active">
		      <img src="images/carousel-image-1.png"  class="d-block w-100" alt="...">
		    </div>
		    <div data-interval="3000" class="carousel-item" data-interval="2000">
		      <img src="images/carousel-image-2.jpg"  class="d-block w-100" alt="...">
		    </div>
		    <div data-interval="3000" class="carousel-item">
		      <img src="images/carousel-image-3.png"  class="d-block w-100" alt="...">
		    </div>
		  </div>
		</div>
	</section>

	<section id="section-welcoming">
		<div class="container">
			<h2 class="text-center text-success display-3 mb-5">Welcome to AppleTree website!</h2>
			<blockquote class="blockquote text-right">
			  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
			  <footer class="blockquote-footer bg-white">Creator, <cite title="Source Title">Olzhas</cite></footer>
			</blockquote>
			<br>
		</div>
	</section>

	<section id="section-articles">
		<div class="container" >
			<h3 class="my-4 py-3 display-4 text-center">Related articles</h3>
			<div class="row">

				<a href="#"  class="col-11 col-sm-6 col-md-4 text-decoration-none mb-3">
					<div class="card shadow-sm">
					  	<img src="images/Card_img1.jpg" class="card-img-top img-thumbnail" alt="card-logo">
					  <div class="card-body">
					    <h5 class="card-title">Card title</h5>
					    <p class="card-text"></p>
					  </div>
					</div>
				</a>
				<a href="#"  class="col-11 col-sm-6 col-md-4 text-decoration-none mb-3">
					<div class="card shadow-sm">
					  <img src="images/Card_img2.jpg" class="card-img-top img-thumbnail" alt="card-logo">
					  <div class="card-body">
					    <h5 class="card-title">Card title</h5>
					    <p class="card-text"></p>
					  </div>
					</div>
				</a>
				<a href="#"  class="col-11 col-sm-6 col-md-4 text-decoration-none mb-3">
					<div class="card shadow-sm">
					  <img src="images/Card_img3.jpg" class="card-img-top img-thumbnail" alt="card-logo">
					  <div class="card-body">
					    <h5 class="card-title">Card title</h5>
					    <p class="card-text"></p>
					  </div>
					</div>
				</a>

			</div>
		</div>
	</section>

	<section id="section-faq">
		<div class="container">
			<h3 class="my-4 py-3 display-4 text-center">Frequently asked questions</h3>
			<div class="accordion my-5" id="accordion-item">
			  <div class="card">
			    <div class="card-header" id="headingOne">
			      
			        <button class="btn btn-link btn-block text-left collapsed text-success"  type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
			          What days of the week AppleTree offer classes?
			        </button>
			     
			    </div>
			    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion-item">
			      <div class="card-body container-fluid mb-0">
			      	<div class="row">
			      		<div class="col-5 col-md-3">
			      			<img src="images/1.jpg" alt="..." class="float-left" style="width: 100%;">
			      		</div>
			      		<div class="col">
			      			We offer classes 7 days a week with exceptions on state holidays. 
			      		</div>			
			      	</div>	      	
			      </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingTwo">
			      <p class="mb-0">
			        <button class="btn btn-link btn-block text-left collapsed text-success" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          What is the maximum size of one group?
			        </button>
			      </p>
			    </div>
			    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-item">
			      <div class="card-body">
					Maximum size reaches 6 students, but usually we have 3-4 students in one group.
			      </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingThree">
			      <p class="mb-0">
			        <button class="btn btn-link btn-block text-left collapsed text-success" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          Do groups are gathered in small age range of students?
			        </button>
			      </p>
			    </div>
			    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion-item">
			      <div class="card-body">
					No, in AppleTree we see it more beneficial not to divide groups by ages, because primary attribute for entire group is a common language level of learners.
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</section>

	<section id="section-schedule">
		<div class="py-4 bg-dark text-white container-fluid">	
			<h2 class="my-3 py-3 text-center display-4">Work schedule</h2>
			<div class="row d-flex justify-content-center">
				<div class="col-12  col-md-6">
					<table class="my-5 table table-dark table-striped">
					  <thead>
					    <tr>
					      <th scope="col">Day of week</th>
					      <th scope="col">Working time</th>
					      <th scope="col">Online application reception time</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td>Weekday</td>
					      <td>9:00 - 19:00</td>
					      <td>9:00 - 21:00</td>
					    </tr>
					    <tr>
					      <td>Saturday</td>
					      <td>10:00 - 16:00</td>
					      <td>10:00 - 18:00</td>
					    </tr>
					    <tr>
					      <td>Sunday</td>
					      <td>10:00 - 16:00</td>
					      <td>10:00 - 16:00</td>
					    </tr>
					  </tbody>
					</table>
					<br>
					<p class="alert alert-success small"><strong>Note:</strong> There may be difference on state holidays and during school holidays (summer and winter seasons) </p>
				</div>		
			</div>
		</div>
	</section>
	
	<section id="section-pricing">
		<div class="container py-3">
			<h3 class="display-4 text-center">Pricing</h3>
			<div class="row d-flex justify-content-center text-center my-5 py-3 ">
				<div class="my-2 card col-7 col-sm-4 col-md-3 mx-3 px-0 bg-light">
					<div class="card-header">
						Group lesson fee
					</div> 
					<div class="card-body">
						<strong>
							<h2>2000tg/les</h2>
							<p>During weekday</p>
						</strong>			  	
						<p class="text-left my-0"><small><em>Additional price assigned according to education level</em></small></p>
					</div>	
				</div>
				<div class="my-2 card col-7 col-sm-4 col-md-3 mx-3 px-0" style="background-color: rgba(51, 204, 51, 0.4);">
					<div class="card-header">
						Private lesson fee
					</div> 
					<div class="card-body">
						<strong>
							<h2>3200tg/les</h2>
							<p>Every day</p>
						</strong>			  	
						<p class="text-left my-0"><small><em>Additional price assigned according to education level</em></small></p>
					</div>	
				</div>
				<div class="my-2 card col-7 col-sm-4 col-md-3 mx-3 px-0" style="background-color: rgba(255, 204, 0, 0.5);">
					<div class="card-header">
						Group lesson fee
					</div> 
					<div class="card-body">
						<strong>
							<h2>2500tg/les</h2>
							<p>During weekend</p>
						</strong>			  	
						<p class="text-left my-0"><small><em>Additional price assigned according to education level</em></small></p>
					</div>	
				</div>
			</div>
			<div class="row text-center">
				<div class="col-8 col-lg-6 mx-auto mb-3">
					<p class="alert alert-success small">
						<strong>Note: </strong> Detailed prices per lesson and per month will be given on application page, since education level tariff tend to change!
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php
	include_once($footer_uri);
	?>

	<!-- Importing jquery, bootstrap's and custom scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/smooth_scroll.js"></script>
	<script src="js/scroll_logo_resize.js"></script>
</body>
</html>

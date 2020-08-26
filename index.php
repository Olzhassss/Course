<?php
	include_once('./root.php');
	include_once($connection_config);
	//session_start();
	//$username = "";
	$title = 'AppleTree main page';
	// Storing all necessary files in arrays for further import
	$custom_stylesheets = array("header.style.css", "footer.style.css", "loader.style.css");
	$custom_scripts = array("smooth_scroll.js", "scroll_logo_resize.js", "loader.js");
	// Storing little style adjustments for further amendment 
	$custom_styles = "#section-pricing { padding-bottom: 0px;}";
	// Get strings from the database
	$result = $pdo->query("SELECT `name`,`text` FROM $db_name . short_texts");
	$short_texts = $result->fetchAll(PDO::FETCH_COLUMN|PDO::FETCH_GROUP);
	// Set the string values for corresponding variables to be used on the page
	$blockquote_citation = $short_texts['blockquote_citation'][0];
	$welcoming_text = $short_texts['welcoming_text'][0];
	$blockquote_text = $short_texts['blockquote_text'][0];
	$schedule_note = $short_texts['schedule_note'][0];
	$pricing_note = $short_texts['pricing_note'][0];
	// Loader gif
	$spinner_src = $imgs . "spinner.gif";
?>
<!DOCTYPE html>
<html>
<!-- Importing head tag -->
<?php include_once($head_uri); ?>
<body>
	<!-- Importing the header -->
	<?php include_once($header_uri); ?>
	
	<!-- The loader -->
	<div id="loader_div" class="loader">
		<img src="<?=$spinner_src?>" alt="spinner">
	</div>

	<section id="section-home">
		<div id="carousel-1" class="carousel slide"  data-ride="carousel" title="The slide will not change while your mouse is here :)">
		  <div class="carousel-inner">
		  	<?php 	//------------------- Extracting carousel images from the database table 'carousel_imgs'
		  	//Fetch results
		  	$result = $pdo->query("SELECT `img_file_name` FROM $db_name . carousel_imgs");
		  	//Display results
		  	while($img_urn = $result->fetch()['img_file_name']):
		 	?>
		  		<div data-interval="5000" class="carousel-item">
		  		  <img src="<?= $imgs.$img_urn ?>"  class="d-block w-100" alt="<?= $img_urn ?>">
		  		</div>
		  	<?php endwhile; ?>
		  </div>
		</div>
	</section>

	<section id="section-welcoming">
		<div class="container">
			<h2 id="welcoming_text" class="text-center text-success display-3 mb-5"><?= $welcoming_text ?> </h2>
			<blockquote class="blockquote text-right">
			  <p id="blockquote_text" class="mb-0"><?= $blockquote_text ?> </p>
			  <?php if(isset($blockquote_citation))
			  	{
			  		echo "<footer class='blockquote-footer bg-white'> <cite title='Source Title'>$blockquote_citation</cite></footer>";
			  	}
			  ?>
			</blockquote>
			<br>
		</div>
	</section>

	<section id="section-articles">
		<div class="container" >
			<h3 class="my-4 py-3 display-4 text-center">Related articles</h3>
			<div class="row">

				<?php 	//------------------- Extracting card images and titles from the database table 'articles'
		  		// Fetch results
		  		$result = $pdo->query("SELECT `title`,`img_file_name` FROM $db_name . articles");
		  		// Display results by repeating the cycle for every fetched row in the table
		  		while($data = $result->fetch(PDO::FETCH_OBJ)):
		 		?>

		  			<a href="article.php"  class="col-11 col-sm-6 col-md-4 text-decoration-none mb-3">
		  				<div class="card shadow-sm">
		  					<img src="<?= $imgs.$data->img_file_name ?>" class="card-img-top img-thumbnail" alt="card-logo">
		  					<div class="card-body">
		  						<h5 class="card-title"><?= $data->title ?></h5>
		  					</div>
		  				</div>
		  			</a>

		  		<?php endwhile; ?>

			</div>
		</div>
	</section>

	<section id="section-faq">
		<div class="container">
			<h3 class="my-4 py-3 display-4 text-center">Frequently asked questions</h3>
			<div class="accordion my-5" id="accordion-item">

				<?php 	//------------------- Extracting questions and answers from the database table 'faqs'
		  		// Fetch results
		  		$result = $pdo->query("SELECT `question`,`answer` FROM $db_name . faqs");
		  		// Display results
		  		// Temporary variable used to assign non-repeating 'id's for some elements
		  		$temp = 1;
		  		// Repeat for every fetched row in the table
		  		while($data = $result->fetch(PDO::FETCH_OBJ)):
		 		?>

		  			<div class="card">
		  			  <div class="card-header" id="heading<?= $temp ?>">
		  			    <p class="mb-0">
		  			      <button class="btn btn-link btn-block text-left collapsed text-success"  type="button" data-toggle="collapse" data-target="#collapse<?= $temp ?>" aria-expanded="false" aria-controls="collapse<?= $temp ?>">
		  			        <?= $data->question.PHP_EOL ?>
		  			      </button>
		  			    </p>
		  			  </div>
		  			  <div id="collapse<?= $temp ?>" class="collapse" aria-labelledby="heading<?= $temp ?>" data-parent="#accordion-item">
		  			    <div class="card-body">
		  			    	<?= $data->answer.PHP_EOL ?>
		  			    </div>
		  			  </div>
		  			</div>

		  		<?php
		  		$temp++;
		  		endwhile;
		  		?>

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

						<?php 	//------------------- Extracting schedule information from the database table 'work_schedule'
				  		// Fetch results
				  		$result = $pdo->query("SELECT `day_of_week`,`working_time`,`app_time` FROM $db_name . work_schedule");
		  				// Display results by repeating the cycle for every fetched row in the table
				  		while($data = $result->fetch(PDO::FETCH_OBJ)):
				 		?>

				  			<tr>
				  				<td><?= $data->day_of_week ?></td>
				  				<td><?= $data->working_time ?></td>
				  				<td><?= $data->app_time ?></td>
				  			</tr>

				  		<?php endwhile; ?>

					  </tbody>
					</table>
					<br>
					<span id="schedule_note">
						<?php if(isset($schedule_note))
							{
								echo "<p class='alert alert-success small'><strong>Note: </strong>$schedule_note</p>";
							}
						?>
					</span>
				</div>		
			</div>
		</div>
	</section>
	
	<section id="section-pricing">
		<div class="container py-3">
			<h3 class="display-4 text-center py-2 my-2">Offers</h3>
			<div class="row d-flex justify-content-center text-center my-5 py-3 ">

				<?php 	//------------------- Extracting pricing information from the database table 'price_list'
					//Fetch results
					$result = $pdo->query("SELECT `card_header`,`price`,`condition`,`note` FROM $db_name . price_list");
		  			// Display results by repeating the cycle for every fetched row in the table
					while($data = $result->fetch(PDO::FETCH_OBJ)):
				?>

					<div class="price-card my-2 card col-7 col-sm-4 col-md-3 mx-3 px-0">
						<div class="card-header">
							<?= $data->card_header ?>
						</div> 
						<div class="card-body">
							<strong>
								<h2><?= $data->price ?>tg/les</h2>
								<p><?= $data->condition ?></p>
							</strong>			  	
							<p class="text-left my-0"><small><em><?= $data->note ?></em></small></p>
						</div>	
					</div>

				<?php endwhile; ?>

			</div>
			<div class="row text-center">
				<div class="col-8 col-lg-6 mx-auto">
					<span id="pricing_note">
						<?php if(isset($pricing_note))
							{
								echo "<p class='alert alert-success small'><strong>Note: </strong>$pricing_note</p>";
							}
						?>
					</span>
				</div>
			</div>
		</div>
	</section>
	<!-- Importing the footer -->
	<?php include_once($footer_uri); ?>
</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Importing script files by PHP -->
<?php
foreach ($custom_scripts as $value)
    {
   		echo "<script src='$js$value'></script>".PHP_EOL;
    }
?>
<script>
	$(document).ready(function(){
		// Activating first carousel slide (necessary)
		$(".carousel-item").first().addClass("active");

		// This array stores available colors for futher usage
		var colors = ['rgba(208, 210, 208, 0.7)', 'rgba(107, 255, 107, 0.7)', 'rgba(255, 231, 81, 0.7)'];
		// Assigning background colors randomly for price list cards using data from the array above
		$(".price-card").each(function(index){
			$(this).css("background-color", colors[Math.floor(Math.random()*colors.length)]);
		})
		// Deactivating loader
		fix_loader("loader_div");
	})
</script>
</html>

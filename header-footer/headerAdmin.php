<?php
	$logo_src = $imgs . "logo.png";
	$header_href = $index;
	$applications_href = $root . "/administration/admin_main.php";
	$schedule_href = $root . "/administration/schedule.php";
	$staff_href = $root . "/administration/admin_main.php";
	$classes_href = $root . "/administration/admin_main.php";
	$frontpageEdit_href = $root . "/administration/admin_main.php";
	$logout_href = $root . "/administration/logout.php";
?>
<section id="section-header" style="padding: 0px;">
	<!-- Header content wrapper div -->
	<div id="headerdiv" class="d-flex flex-column flex-md-row align-items-center p-3 shadow mb-5" >
		<!-- Logo and title referencing to the main webpage -->
		<a href="<?=$header_href?>" class="text-decoration-none">
			<img src="<?=$logo_src?>" id="header-logo" hspace="0" alt="logo">
		</a>
		<div class="d-flex flex-column flex-md-row align-items-center justify-content-between w-100">	
			<a class="py-2 px-3 btn mx-md-2 py-lg-3 main_text btn-secondary text-decoration-none" href="<?=$header_href?>">
				To main page
			</a>
			<!-- End of Logo and title -->
			<!-- Navigation row -->
			<div class="my-3 my-md-0 mx-md-2 col">
				<div class="container-fluid">
					<nav class="row d-flex justify-content-around">
						<a href="<?=$applications_href?>" class="col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Applications <span id="app_badge"class="badge badge-warning"></span></a>
						<a href="<?=$schedule_href?>" class="col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Schedule</a>
						<a href="<?=$staff_href?>" class="col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Current staff</a>
						<a href="<?=$classes_href?>" class="col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Classes</a>
						<a href="<?=$frontpageEdit_href?>" class="col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Front page edit</a>
					</nav>
				</div>
			</div>
			<!-- End of navigation -->
			<a class="btn logout_link mx-md-2 my-2 my-md-0 py-2 py-lg-3 px-3" href="<?=$logout_href?>">Log out</a>
		</div>
		
	</div>
</section>
<?php
	$logo_src = $imgs . "logo.png";
	$header_href = $index;
	$applications_href = $root . "/administration/admin_main.php";
	$schedule_href = $root . "/administration/admin_main.php";
	$teachersList_href = $root . "/administration/admin_main.php";
	$studentsList_href = $root . "/administration/admin_main.php";
	$logout_href = $root . "/administration/logout.php";
?>
<section id="section-header" style="padding: 0px;">
	<!-- Header content wrapper div -->
	<div id="headerdiv" class="d-flex flex-column flex-md-row align-items-center justify-content-between p-3 shadow" >
		<!-- Logo and title referencing to the main webpage -->
		<a href="<?=$header_href?>" class="text-decoration-none">
			<img src="<?=$logo_src?>" id="header-logo" hspace="0" alt="logo">
		</a>
		<a class="py-2 px-3 btn mx-md-2 py-lg-3 main_text btn-secondary text-decoration-none" href="<?=$header_href?>">
			To main page
		</a>
		<!-- End of Logo and title -->
		<!-- Navigation row -->
		<div class="my-3 my-md-0 mx-md-2 w-50">
			<div class="container-fluid">
				<nav class="row d-flex justify-content-around">
					<a href="<?=$applications_href?>" class="col-xs-10 col-sm-5 col-lg m-1 py-2 py-lg-4 font-weight-bold btn btn-info text-decoration-none">Applications <span id="app_badge"class="badge badge-warning"></span></a>
					<a href="<?=$schedule_href?>" class="col-xs-10 col-sm-5 col-lg m-1 py-2 py-lg-4 font-weight-bold btn btn-info text-decoration-none">Schedule</a>
					<a href="<?=$teachersList_href?>" class="col-xs-10 col-sm-5 col-lg m-1 py-2 py-lg-4 font-weight-bold btn btn-info text-decoration-none">Teachers list</a>
					<a href="<?=$studentsList_href?>" class="col-xs-10 col-sm-5 col-lg m-1 py-2 py-lg-4 font-weight-bold btn btn-info text-decoration-none">Students list</a>
				</nav>
			</div>
		</div>
		<!-- End of navigation -->
		<a class="btn logout_link mx-md-2 my-2 my-md-0 py-2 py-lg-3 px-3" href="<?=$logout_href?>">Log out</a>
	</div>
</section>
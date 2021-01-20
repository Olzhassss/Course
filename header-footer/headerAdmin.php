<?php
	$logo_src = $imgs . "logo.png";
	$applications_href = $appInject_url;
	$schedule_href = $schInject_url;
	$members_href = $memInject_url;
	$classes_href = $clsInject_url;
	$edit_href = $edtInject_url;
	$logout_href = $logout_url;
?>
<section id="section-header" style="padding: 0px;">
	<!-- Header content wrapper div -->
	<div id="headerdiv" class="d-flex flex-column flex-md-row align-items-center p-3 shadow mb-2" >
		<!-- Logo and title referencing to the main webpage -->
		<a href="<?=$index_url?>" class="text-decoration-none">
			<img src="<?=$logo_src?>" id="header-logo" hspace="0" alt="logo">
		</a>
		<div class="d-flex flex-column flex-md-row align-items-center justify-content-between w-100">	
			<a class="py-2 px-3 btn mx-md-2 py-lg-3 main_text btn-secondary text-decoration-none" href="<?=$index_url?>">
				To main page
			</a>
			<!-- End of Logo and title -->
			<!-- Navigation row -->
			<div class="my-3 my-md-0 mx-md-2 col">
				<div class="container-fluid">
					<nav class="row d-flex justify-content-around">
						<button data-essence ="schedule" href="<?=$schedule_href?>" class="header-button col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Schedule</button>
						<button data-essence ="applications" href="<?=$applications_href?>" class="header-button col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Applications <span class="badge badge-warning"></span></button>						
						<button data-essence ="members" href="<?=$members_href?>" class="header-button col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Members</button>
						<button data-essence ="classes" href="<?=$classes_href?>" class="header-button col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Classes</button>
						<button data-essence ="edit" href="<?=$edit_href?>" class="header-button col-xs-10 col-sm-5 col-lg-4 col-xl m-1 py-2 py-xl-4 font-weight-bold btn btn-info text-decoration-none">Main page</button>
					</nav>
				</div>
			</div>
			<!-- End of navigation -->
			<a class="btn logout_link mx-md-2 my-2 my-md-0 py-2 py-lg-3 px-3" href="<?=$logout_href?>">Log out</a>
		</div>
		
	</div>
</section>
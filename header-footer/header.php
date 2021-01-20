<!-- BEGINNING OF THE HEADER -->
<?php
	$logo_src = $imgs . "logo.png";
	$header_href = $index_url . "#section-header";
	$contacts_href = $index_url . "#section-footer";
	$pricing_href = $index_url . "#section-pricing";
	$faq_href = $index_url . "#section-faq";
?>
<section id="section-header" style="padding: 0px;">
		<!-- Header content wrapper div -->
		<div id="headerdiv" class="d-flex flex-column flex-md-row align-items-center p-3 shadow" >
			<!-- Logo and title referencing to the main webpage -->
			<a href="<?=$header_href?>" class="text-decoration-none">
				<img src="<?=$logo_src?>" id="header-logo" hspace="0" alt="logo">
			</a>
			<h4  class="mr-md-auto ml-md-2" >
				<a class="text-decoration-none main_text" href="<?=$header_href?>">
					AppleTree English courses!
				</a>
			</h4>
			<!-- End of Logo and title -->
			<!-- Navigation row -->
			<nav class="my-2 my-md-0 mr-md-2">
			    <a class="p-2 text-light text-decoration-none" href="<?=$contacts_href?>">Contacts</a>
			    <a class="p-2 text-light text-decoration-none" href="<?=$pricing_href?>">Price list</a>
			    <a class="p-2 text-light text-decoration-none" href="<?=$faq_href?>">FAQ</a>
			    <a class="p-2 text-light text-decoration-none" href="<?=$authorizationPage_url?>">Administration</a>
			</nav>
			<!-- End of navigation -->
			<a class="btn application_link mr-md-2 my-2 my-md-0 ml-md-5" href="<?=$appMain_url?>">Application</a>
		</div>
</section>
<!-- END OF HEADER -->
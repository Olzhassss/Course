<!-- BEGINNING OF THE HEADER -->
<?php
	$logo_src = $imgs . "logo.png";
	$contacts_href = $index . "#section-footer";
	$pricing_href = $index . "#section-pricing";
	$faq_href = $index . "#section-faq";
	$authorization_href = $temp . "/administration/sign_in.php";
?>
<section id="section-header" style="padding: 0px;">
		<!-- Header content wrapper div -->
		<div id="headerdiv" class="d-flex flex-column flex-md-row align-items-center p-3 shadow" >
			<!-- Logo and title referencing to the main webpage -->
			<a href="index.php#section-header" class="text-decoration-none">
				<img src="<?=$logo_src?>" id="header-logo" hspace="0" alt="logo">
			</a>
			<h4  class="mr-md-auto ml-md-2 main-text" >
				<a class="text-decoration-none" href="<?=$index?>#section-header">
					AppleTree English courses!
				</a>
			</h4>
			<!-- End of Logo and title -->
			<!-- Navigation row -->
			<nav class="my-2 my-md-0 mr-md-2">
			    <a class="p-2 text-light text-decoration-none" href="<?=$contacts_href?>">Contacts</a>
			    <a class="p-2 text-light text-decoration-none" href="<?=$pricing_href?>">Price list</a>
			    <a class="p-2 text-light text-decoration-none" href="<?=$faq_href?>">FAQ</a>
			    <a class="p-2 text-light text-decoration-none" href="<?=$authorization_href?>">Administration</a>
			</nav>
			<!-- End of navigation -->
			<a class="btn application-link mr-md-2 my-2 my-md-0 ml-md-5" href="<?=$app0?>">Application</a>
		</div>
</section>
<!-- END OF HEADER -->
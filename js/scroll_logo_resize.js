// When the user scrolls down 50px from the top of the document, the script resizes the logo's size
	window.onscroll = function() {scrollFunction()};
	var logo = document.getElementById("header-logo");

	function scrollFunction() {
		header = document.getElementById("headerdiv");
		section_home = document.getElementById("section-home");
		if (window.pageYOffset > header.offsetTop)
		{
			header.classList.add("stuck");
			section_home.style.paddingTop = "182px";
		} else
		{
			header.classList.remove("stuck");
			section_home.style.paddingTop = "0px";
		}

		if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400)
		{
			logo.style.width = "51px";
		    logo.style.height = "45px";
		  
		} else
		{
			logo.style.width = "170px";
			logo.style.height = "150px";
		}
	}
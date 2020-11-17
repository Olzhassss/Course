window.onscroll = function() {scroll_screen()};

function scroll_screen() {
	let section_monday = document.getElementById("section-monday");
	let navbar = document.getElementById("navbar");
	let var_duration = 500;
	// Check if script successfully accessed necessary elements
	if (section_monday === null || navbar === null)
	{
		console.error("'scroll_screen' function: impossible to access necessary elements by id!");
		return false;
	}
	// Managing header fixation
	//console.log(section_monday.offsetTop);
	if (window.pageYOffset > section_monday.offsetTop)
	{
  	    navbar.classList.add("not_hidden");
	} else
	{
		navbar.classList.remove("not_hidden");
	}
}
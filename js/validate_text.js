// This function changes the background color of each element of 'fields' (array of elements)
// if it is correctly filled, and if any element does not pass checkValidity(), then scrolls up,
// as well as shows or hides error messages
// (by adding Bootstrap class 'd-none' {display: none} to a corresponding element from 'errors')
function validate_text(fields, errors)
{
	// Local variable used to prevent multiple 'animate()' scenarios
	var foo = true;
	// Local variable used to check if every field passed validation
	var passed = true;
	// Going through every element passed via 'fields' argument
	for (var i = 0; i<fields.length; i++) 
	{
		/*if (fields[i].classList.contains("required") && fields[i].value =="")
		{
			fields[i].style.backgroundColor = "#ffffff";
			errors[i].classList.remove("d-none");
			
			if (foo)
			{
				foo = false;
				$([document.documentElement, document.body]).animate(
				{
					scrollTop: fields.first().offset().top - 60
				}, 1000);
			}
			passed = false;
			continue;
		}*/
		if (fields[i].checkValidity())
		{
			fields[i].style.backgroundColor = "#ccf2ff";
			try
			{
  				errors[i].classList.add("d-none");
			} catch (error)
			{
				alert(error.message);
			}
		} else
		{
			passed = false;
			fields[i].style.backgroundColor = "#ffffff";
			errors[i].classList.remove("d-none");
			if (foo)
			{
				foo = false;
				$([document.documentElement, document.body]).animate(
				{
					scrollTop: fields.first().offset().top - 60
				}, 1000);
			}
		}
	}
	if (passed)
	{
		return true;
	}
	else
	{
		return false;
	}
}
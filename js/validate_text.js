// This function changes the background color of each element of 'fields' (array of elements)
// if it is correctly filled, and if any element does not pass checkValidity(), then scrolls up,
// as well as shows or hides error messages
// (by adding Bootstrap class 'd-none' {display: none} to a corresponding 'error' element, id of which
// should be given in 'error-field' attribute as a value string)
function validate_text(fields)
{
	// Input argument validation
	if (fields === undefined || fields.length < 1)
	{
		console.error("'validate_text' function: False input argument!");
		return false;
	}
	// Trying to assemble array of error fields. If at least 1 element of 'fields' does not have
	// required attribute 'error-field' value or the element is inaccessible, the function returns
	// FALSE and error text
	var errors = [];
	fields.each(function ()
	{
		if ($(this).attr('error-field') === undefined)
		{
			console.error("'validate_text' function: Impossible to access to every error field for given list, check the attributes!0");
			return false;
		}
		errors.push($("#"+$(this).attr('error-field')));
	});

	// Local variable used to prevent multiple 'animate()' scenarios
	var foo = true;
	// Local variable used to check if every field passed validation
	var passed = true;

	try
	{
		// Going through every element passed via 'fields' argument
		for (var i = 0; i<fields.length; i++) 
		{
			if (fields[i].checkValidity())
			{
				fields[i].style.backgroundColor = "#ccf2ff";
				errors[i].addClass("d-none");
			} else
			{
				passed = false;
				fields[i].style.backgroundColor = "#ffffff";
				errors[i].removeClass("d-none");
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
	}
	catch
	{
		console.error("'validate_text' function: Failed to check elements! Check if input argument is jQuery object.");
		return false;
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
// This function validates list via calling function 'check_list_limit'
// (declared below) and by checking input arguments validity;
// additionally, the function displays or hides error messages
// (by adding Bootstrap class 'd-none' {display: none} to the element with id given in 'error_el_id' arg.)
// and scrolls screen up to regarded list of elements if validation failed.
// Returns TRUE if every element of the list has been successfully validated, else FALSE.
function validate_list(list, minimum)
{
	// Input arguments validation
	if(list === undefined || list.length < 2)
	{
		console.error("'validate_list' function: False input arguments!");
		return false;
	}
	var attr_val = list.first().attr("error-field");
	if(attr_val === undefined || attr_val === "" )
	{
		console.error("'validate_list' function: Wrong 'error-field' attribute value!");
		return false;
	}
	var error_field = $("#"+attr_val);
	if (error_field.val() === undefined)
	{
		console.error("'validate_list' function: Failed to access the corresponding error field! Check the'error-field' attribute value.");
		return false;
	}
	if(isNaN(parseInt(minimum, 10)) || minimum < 0)
	{
		console.error("'validate_list' function: Wrong limitation argument!");
		return false;
	}
	// Main if
	if(check_list_limit(list, minimum))
	{
		error_field.addClass("d-none");
		return true;
	}
	else
	{
		error_field.removeClass("d-none");
		$([document.documentElement, document.body]).animate(
		{
			scrollTop: list.first().offset().top - 110
		}, 1000);
		return false;
	}
	// endif
}

// Declare function which returns TRUE if argument 'list' (array of elements) has at least X
// (where X equals the value of 'min') elements or the exception element
// (which is determined by attribute 'exclusive' set to 'true') has class 'active'.
// The function return false if minimum is not reached.
function check_list_limit(list, min)
{
	var count = 0;
	list.map(function()
	{
		if($(this).attr("exclusive") === "true" && $(this).hasClass("active"))
		{
			count = min;
			return;
		}
		else if($(this).hasClass("active"))
		{
			count++;
		}
	})
	if (count >=min)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}
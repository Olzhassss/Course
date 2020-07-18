// This function validates list via calling function 'check_list_limit'
// (declared below) and by checking input arguments validity;
// additionally, the function displays or hides error messages
// (by adding Bootstrap class 'd-none' {display: none} to the element with id given in 'error_el_id' arg.)
// and scrolls screen up to regarded list of elements if validation failed.
function validate_list(list, minimum, error_el_id, exception_el_id)
{
	// Input arguments validation
	if(!(list.length > 0)|| !(Number.isInteger(minimum) && minimum > 0))
	{
		console.log("The 'check_list_limit' function false arguments!")
		return false;
	}
	if(typeof error_el_id === undefined)
	{
		console.log("The error field id (argument) required!")
		return false;
	}
	if(check_list_limit(list,  minimum, exception_el_id))
	{
		$("#" + error_el_id).addClass("d-none");
		return true;
	}
	else
	{
		$("#" + error_el_id).removeClass("d-none");
		$([document.documentElement, document.body]).animate(
		{
			scrollTop: list.first().offset().top - 75
		}, 1000);
		return false;
	}
}

// Declare function which returns TRUE if argument 'list' (array of elements) has at least X
// (where X equals the value of 'min') elements or the exception element (accessed via 'exception_el_id')
// with class 'active'.
// The function return false if there were improper arguments 'list' and 'min', or minimum is not succeded.
// The 'exception_el_id' is optional argument.
function check_list_limit(list, min, exception_el_id)
{
	var count = 0;
	for (var i = 0; i < list.length; i++)
	{
		if(list[i].id == exception_el_id && list[i].classList.contains("active"))
		{
			return true;
		}
		else if(list[i].classList.contains("active"))
		{
			count++;
		}
	}
	if (count >=min)
	{
		return true;
	}
	else
	{
		return false;
	}
}
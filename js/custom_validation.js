function validate_birthYear(id)
{
	// Trying to declare variables and assure proper access to html elements.
	var birthyear = document.getElementById(id);
	if(birthyear === null)
	{
		console.error("'validate_birthYear' function: Failed to access the element of given id!\nGiven argument value is: " + id);
		return false;
	}
	var attr_val = $("#"+id).attr('error-field');
	if(attr_val === undefined || attr_val === "" )
	{
		console.error("'validate_birthYear' function: Wrong 'error-field' attribute value!");
		return false;
	}
	var error_field = $("#"+attr_val);
	if (error_field.val() === undefined)
	{
		console.error("'validate_birthYear' function: Failed to access the corresponding error field! Check the'error-field' attribute value.");
		return false;
	}

	/*if (!birthyear.checkValidity())
	{
		console.log(error_field.offset().top);
		$([document.documentElement, document.body]).animate(
		{
		scrollTop: error_field.offset().top - 250
		}, 1000);
		return false;
	}
	else*/
	if (parseInt(birthyear.value) > new Date().getFullYear()|| parseInt(birthyear.value) < 1920)
	{
		error_field.removeClass("d-none");
		birthyear.style.backgroundColor = "#ffffff";
		$([document.documentElement, document.body]).animate(
		{
			scrollTop: error_field.offset().top - 85
		}, 1000);
		return false;
	}
	else
	{
		return true;
	}
}
	// Declaring the function which distributes bootstrap class 'active'
	// so that element with id given in argument 'exclusive_id' cannot be active together with any other element.
	function select(list, id, exclusive_id)
	{
		var object = document.getElementById(id);
		if (object.id == exclusive_id && !object.classList.contains("active")) 
		{
			for (var i = 0; i < list.length; i++)
			{
				list[i].classList.remove("active");
			}
			object.classList.add("active");
		}else
		{
			if (object.classList.contains("active"))
			{
				object.classList.remove("active");
			}
			else
			{
				object.classList.add("active");
				document.getElementById(exclusive_id).classList.remove("active");
			}
		}
	}
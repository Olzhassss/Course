// This function attaches event event listeners on every click for every element of 'li_classname' argument
// so that click triggers select() function.
function set_click_listener(li_classname, exclusive_el_id)
{
	// Input arguments validation
	if(typeof li_classname !== "string" || typeof exclusive_el_id !== "string")
	{
		console.log("function set_click_listener false input arguments!");
		return false;
	}

	var list = document.getElementsByClassName(li_classname);
	for(var i=0; i< list.length; i++)
	{
		list[i].addEventListener('click', function(){
			select(list, this.id, exclusive_el_id)
		})
	}
	return true;
}
// Declaring the function which distributes bootstrap class 'active'
// so that element with id given in argument 'exclusive_el_id' cannot be active together with any other element.
function select(list, id, exclusive_el_id)
{
	var object = document.getElementById(id);
	if (object.id == exclusive_el_id && !object.classList.contains("active")) 
	{
		for (var i = 0; i < list.length; i++)
		{
			list[i].classList.remove("active");
		}
		object.classList.add("active");
		return;
	}else
	{
		if (object.classList.contains("active"))
		{
			object.classList.remove("active");
			return;
		}
		else
		{
			object.classList.add("active");
			document.getElementById(exclusive_el_id).classList.remove("active");
			return;
		}
	}
}
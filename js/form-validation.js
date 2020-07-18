// Save form elements depending on their CSS class in an array
var elements = document.getElementsByClassName("form-control");
// This function changes the background of the element if entered data passes validation
// (which is a 'pattern' attribute of given input tag)
function modify_background_color(array, i)
{
	if(array[i].checkValidity())
	{
		array[i].style.backgroundColor = "#ccf2ff";
	} else 
	{
		array[i].style.backgroundColor = "#ffffff";
	}
	return;
}
// During this loop the function event listener is attached to every text input field
for (var i = 0; i < elements.length; i++)
{
	if(elements[i].getAttribute("type")=="text")
	{
		elements[i].addEventListener('change', function(){
			modify_background_color(elements, i);
		});
	}
}
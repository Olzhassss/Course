// Add smooth scrolling to the links in navigation bar
$(document).ready(function(){
	  try
	  {
	  	$("a").click(function(event)
	  	{
	  		if (this.getAttribute('href') && this.getAttribute('href').startsWith("." + window.location.pathname))
	  		{
		  	  // Prevent default anchor click behavior
		  	  event.preventDefault();
		  	  
		  	  // ------------------ Main 'if'. Works only if links contain hash
		  	  if (this.hash !== "" && !$(this).hasClass("disabled"))
		  	  {
		  	    // Store the html link and its hash
		  	    var hash = this.hash;
		  	    var link = $(this);
		  	    var href = link.attr('href');
		  	    console.log(href);
		  	    // Setting the duration time for the animation in milliseconds
		  	    var var_duration = 1300;
		  	    // Assigning animation
		  	    link.addClass("disabled");
		  	    $('html, body').animate(
		  	    {
		  	    	scrollTop: $(hash).offset().top
		  	    },
		  	    {
		  	    	duration: var_duration,
	    			complete: function() {
		  	 	  		// Add hash (#) to URL when done scrolling (default click behavior)
		  	      		window.location.hash = hash;
		  	      		link.removeClass("disabled");
		  	    	}
		  	    }
	    		);
		  	  }
		  	  else
		  	  {
		  	  	console.error("'smooth_scroll' function: Link's hash is empty!");
		  	  }
		  	  // -------------------- End of 'if'
	  		}
	  	  
	  	});
	  }
	  catch
	  {
	  	console.error("'smooth_scroll' function: No elements found!");
	  }
	});
$(document).ready(function(){
	  // Add smooth scrolling to the links in navigation bar
	  $("a").click(function(event) {
	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "")
	    {
	      // Prevent default anchor click behavior
	      event.preventDefault();
		  
	      // Store hash
	      var hash = this.hash;
	      var delay = 1300;

	      // Using jQuery's animate() method to add smooth page scroll
	      $('html, body').animate(
	      {
	        scrollTop: $(hash).offset().top
	      },
	      delay,
	      function()
	      {
	   		// Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      }/*,
	      {
    		progress: function()
    		{
        		//$('#log').html(100 * progress + "%");
    		}
    	  }*/
    	);
	    } // End if
	  });
	});
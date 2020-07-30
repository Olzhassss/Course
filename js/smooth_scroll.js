// The code is based on code from w3schools 'howto' tutorial about smooth page scroll,
// https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_smooth_scroll_jquery
$(document).ready(function(){
	  // Add smooth scrolling to the links in navigation bar
	  try
	  {
	  	$("div#headerdiv a").click(function(event)
	  	{
	  	  // ------------------ Main 'if'. this.hash must have a value before overriding default behavior
	  	  if (this.hash !== "")
	  	  {
	  	    // Prevent default anchor click behavior
	  	    event.preventDefault();
	  	    // Store hash
	  	    var hash = this.hash;
	  	    // Setting arbitrary duration time for scrolling in milliseconds
	  	    var duration = 1300;

	  	    $('html, body').animate(
	  	    {
	  	      scrollTop: $(hash).offset().top
	  	    },
	  	    duration,
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
	  	  } // ---------------- endif
	  	});
	  }
	  catch
	  {
	  	console.error("'smooth_scroll' function: error occured! Check #headerdiv element.")
	  }
	});
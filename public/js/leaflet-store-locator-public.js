jq = jQuery.noConflict();
jq(function( $ ) {

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	
	var teksti = scripts.teksti;

	$( "#leaflet_postal_code" ).on('keyup', function(e) {
		
	 	var keyCode = e.keyCode || e.which;
		
	    if (keyCode === 13) { 
	    	e.preventDefault();
	    	return false;
	    }

	 	$("#mm-records").addClass('add-bg');
	 	$(this).addClass('add-border');

		$("#mm-records").html('<div class="loader text-center">Ladataan...</div>');

	 	jQuery.ajax({
	        url: script_vars.ajaxurl + '?_=' + new Date().getTime(),
			cache: false,
	        data: $('#mm_form').serialize(),
			headers: {
			 'Cache-Control': 'no-cache, no-store, must-revalidate', 
			 'Pragma': 'no-cache', 
			 'Expires': '0'
		    },
	        type: 'get',
	        success: function(response) {
	           $("#mm-records").html(response.data);
	        }
	    });
		
	 	if( $(this).val() == "" ) {
	 		$("#mm-records").removeClass('add-bg');
	 		$("#mm-records").html(teksti);
	 	}

	});

	// bind click event to the story divs, add a marker and zoom to that story's location. Remember to add dot before story as it is classname
	$(document).on('click', 'div.story', function(){
	    // parse lat and lng from the divs data attribute
	    var latlng = $(this).data().point.split(',');
	    var lat = latlng[0];
	    var lng = latlng[1];
	    var zoom = 15;

	    // add a marker
	    //var marker = L.marker([lat, lng],{}).addTo(mymap);
	    // set the view
	    mymap.flyTo([lat, lng], zoom);
	    //mymap.setView([lat, lng], zoom);
	});


});

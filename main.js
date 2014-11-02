$( document ).ready(function() {
	$(window).scroll(function() {
		console.log();
	    if ($(this).scrollTop() > 50) {
	        $( "#navigation").addClass('solid_background');
	    } else {
	        $( "#navigation" ).removeClass('solid_background');
	    }
	});	

});
jQuery(document).ready(function($) {

	$(".headroom").headroom({
		"tolerance": 20,
		"offset": 50,
		"classes": {
			"initial": "animated",
			"pinned": "slideDown",
			"unpinned": "slideUp"
		}
	});

});

$('#nav').affix({
      offset: {
        top: $('header').height()
      }
});	

$('#sidebar').affix({
      offset: {
        top: 200
      }
});	
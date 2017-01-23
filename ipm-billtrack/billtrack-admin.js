(function ($) {
	jQuery(document).ready(function($) {
	
		$('body.post-type-billupdates div#pageparentdiv select option.level-1').each(function() {
			$(this).remove();
		});
		
		$('body.post-type-billupdates div#pageparentdiv select option.level-2').each(function() {
			$(this).remove();
		});
		
		$('body.post-type-billupdates div#pageparentdiv select option.level-3').each(function() {
			$(this).remove();
		});
	
		
	});
}(jQuery));
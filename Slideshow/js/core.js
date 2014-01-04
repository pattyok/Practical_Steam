;(function($) {
	$(document).ready(function() {
		$('#slideshow').append('<div class="outerpager"><div class="pager"></div></div>');
		$('#slideshow').append('<div class="prev"></div>');
		$('#slideshow').append('<div class="next"></div>');
		$('#slideshow ul').cycle({
			fx:'fade',
			timeout:0,
			height:380,
			pager:'#slideshow .pager',
			next:'#slideshow .next',
			prev:'#slideshow .prev'
		});
		//set width of pager appropriately to allow for centering
		var count = $('#slideshow .pager a').length;
		var pagerWidth = count * 20;
		$('#slideshow .pager').css('width', pagerWidth);
	})
})(jQuery);

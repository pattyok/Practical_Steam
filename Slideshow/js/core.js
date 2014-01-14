(function($) {
	$(document).ready(function() {
		/*$('#slideshow ul').cycle({
			fx:'fade',
			timeout:0,
			height:380,
			pager:'#slideshow .pager',
			next:'#slideshow .next',
			prev:'#slideshow .prev'
		});*/
		$('#slideshow').slidesjs({
		width: 1080,
        height: 380,
        navigation: {
          effect: "fade"
        },
        pagination: {
          effect: "fade"
        },
        effect: {
          fade: {
            speed: 800
          }
        }
      });
		//set width of pager appropriately to center the paging dots
		var count = $('.slidesjs-pagination li').length;
		var pagerWidth = count * 20;
		$('.slidesjs-pagination').css('width', pagerWidth);
	})
})(jQuery);

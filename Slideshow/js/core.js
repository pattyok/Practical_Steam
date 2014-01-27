(function($) {
	$(document).ready(function() {
		$('#slideshow').slidesjs({
		width: 1080,
        height: 380,
        play: {
			active:true,
			auto:true,
			interval: 4000,
			pauseOnHover:true,
			restartDelay:4000,
			effect: "fade"
		},
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

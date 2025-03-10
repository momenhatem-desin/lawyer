
/* 1. Proloder */
$(window).on('load', function () {
	$('#preloader-active').delay(450).fadeOut('slow');
	$('body').delay(450).css({
	  'overflow': 'visible'
	});
  });


(function($) {
	"use strict"

	// shuffle links
		$('.shuffle li').click(function(){
			$(this).addClass('selected').siblings().removeClass('selected');
			});
 //nise scorll
	$("html").niceScroll({

		cursorcolor:"#ee4266",
		 cursorwidth:"10px"
	   
	   });

	// Mobile dropdown
	$('.has-dropdown>a').on('click', function() {
		$(this).parent().toggleClass('active');
	});

	//share
	$('.share-to').on('click', function() {
		$('.share').fadeToggle();
	});

	//command-add
	$('.comment-to').on('click', function() {
		$('.comment-add').fadeToggle();
	});

	// Aside Nav
	$(document).click(function(event) {
		if (!$(event.target).closest($('#nav-aside')).length) {
			if ( $('#nav-aside').hasClass('active') ) {
				$('#nav-aside').removeClass('active');
				$('#nav').removeClass('shadow-active');
			} else {
				if ($(event.target).closest('.aside-btn').length) {
					$('#nav-aside').addClass('active');
					$('#nav').addClass('shadow-active');
				}
			}
		}
	});

	$('.nav-aside-close').on('click', function () {
		$('#nav-aside').removeClass('active');
		$('#nav').removeClass('shadow-active');
	});


	$('.search-btn').on('click', function() {
		$('#nav-search').toggleClass('active');
	});

	$('.search-close').on('click', function () {
		$('#nav-search').removeClass('active');
	});

	// Parallax Background
	$.stellar({
		responsive: true
	});
})(jQuery);

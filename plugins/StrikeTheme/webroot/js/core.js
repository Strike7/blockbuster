(function($) {
	"use strict";
	/*	Tooltip
	/*----------------------------------------------------*/
	$("[data-toggle='tooltip']").tooltip();
	
	/*	Popover
	/*----------------------------------------------------*/
	$("[data-toggle='popover']").popover();
	
	/*	Img parallax effect
	/*----------------------------------------------------*/
	// cache the window object
	var $window = $(window);
	
	$('[data-type="parallax"]').each(function(){
		var $scroll = $(this);
						 
		$(window).scroll(function() {
		// HTML5 proves useful for helping with creating JS functions!
		// also, negative value because we're scrolling upwards                            
		var yPos = ($window.scrollTop() / $scroll.data('speed'));
			 
		// background position
		var coords = '50% -'+ yPos + 'px';
		// move the background
		$scroll.css({  backgroundPosition: coords });  
		 }); // end window scroll
	});  // end section function
	   
	/*	Fixed Navigation
	/*----------------------------------------------------*/
	$(window).scroll(function(){
        if ($(this).scrollTop() > 40) {
            $('#top').addClass('menu-fixed');
        } else {
			$('#top').removeClass('menu-fixed');
        }
    });
	
	/* Open Modal
	/*----------------------------------------------------*/
	$('#signin .register').click(function () { 
		$('#register').modal('show');
	});	
	
	/* Modal Effects
	/*----------------------------------------------------*/
	$('.modal').on('shown.bs.modal', function (e) {
		var effect  = $(this).data("effect");
		if(effect) {
			$(this).find('.modal').addClass('animated ' + effect + '');
		} else {
			$(this).addClass('animated fadeInFast');
		}
	});

	$('.modal').on('hidden.bs.modal', function (e) {
		var effect  = $(this).data("effect");
		if(effect) {
			$(this).find('.modal').removeClass('animated ' + effect + '');
		} else {
			$(this).removeClass('animated fadeInFast');
		}
	});
	
	/* Responsive Navigation
	/*----------------------------------------------------*/
	$('.bar').click(function() {		
		$('body').toggleClass('open-nav');
		$('#wrapper').click(function() {		
			$('body').removeClass('open-nav');
			$('#wrapper a').click(function() {		
				return false;
			});
		});
	});
	
	$('.dropdown > a').click(function() {		
		return false;
	});
			
	/*	Dropdown Navigation
	/*----------------------------------------------------*/
	$('nav li.dropdown').hover(function() {			
		$(this).find('.dropdown-menu').stop(true, true).show;
		$(this).addClass('open');
	}, function() {
		$(this).find('.dropdown-menu').stop(true, true).hide;
		$(this).removeClass('open');
	});	
	
	$('nav .dropdown-submenu').hover(function() {			
		$(this).addClass('open');
	}, function() {
		$(this).removeClass('open');
	});	
})(jQuery);
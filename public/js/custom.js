$(document).ready(function () {
	new WOW().init();	

	var parallax = document.getElementsByClassName('st-parallax');
	new simpleParallax(parallax, {
		orientation: 'down',
		scale: 1.5,
		delay: .7,
	});
	
	var initInfosBar = function(){
		if (window.pageYOffset >= ($('#st-h-infos').innerHeight()/10)) {
			$('#main-nav-top').css({"position": "fixed", "top": 0});	
			$('#st-sticky-scroll').fadeIn();		
		}else{
			$('#st-sticky-scroll').fadeOut();		
			$('#main-nav-top').css({"position": "fixed", "top": ($('#st-h-infos').innerHeight()-1)});			
		}
	};
	initInfosBar();

	$( window ).scroll(function() {
		initInfosBar();
	});

	$( window ).resize(function() {
		initInfosBar();
	});

	$('#st-sticky-scroll').click(function() {
		window.scrollTo({top: 0, behavior: 'smooth'});
	});
});
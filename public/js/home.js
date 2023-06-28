$(document).ready(function () {
	// main slider
	var mainSwiper = new Swiper('.main-slider.swiper-container', {
		loop:true,
		effect: 'fade',
		pagination: {
	        el: '.main-slider .swiper-pagination',
	        clickable: true,
	        renderBullet: function (index, className) {
		          return '<span class="st-ms-cstm-bullet white py-1 px-3 rounded-0 ' + className + '"></span>';
		        },
      	},
      	navigation: {
            nextEl: '.main-slider .swiper-button-next',
            prevEl: '.main-slider .swiper-button-prev',
        },
      	autoplay: {
			delay: 6000,
		},
    });

	var tsmSwiper = new Swiper ('.st-tsm.swiper-container', { //testimonial
        navigation: {
            nextEl: '.st-tsm .swiper-button-next',
            prevEl: '.st-tsm .swiper-button-prev',
        },
    });

    var optSwiper = new Swiper('.st-options .swiper-container', {
    	effect: 'coverflow',
    	initialSlide: 0,
		grabCursor: true,
		centeredSlides: true,
		slidesPerView: 'auto',
		coverflowEffect: {
			rotate: 50,
			stretch: 0,
			depth: 100,
			modifier: 1,
			slideShadows: false,
		},
		loop: true,
		pagination: {
	        el: '.st-options .swiper-pagination',
	        clickable: true,
	        renderBullet: function (index, className) {
		          return '<span class="st-opt-cstm-bullet st-font st-p-color-d ' + className + '">' + (index + 1) + '</span>';
		        },
	    },
      	navigation: {
            nextEl: '.st-options .swiper-button-next',
            prevEl: '.st-options .swiper-button-prev',
        }
    });
});
$(function () {
	// main slider
	var partnerSwiper = new Swiper('.st-partners-slider.swiper-container', {
		loop: true,
		effect: 'slide',
      	autoplay: {
			delay: 6000,
		},
      	slidesPerView: 'auto',
		navigation: {
			nextEl: '.st-partners-slider .swiper-button-next',
			prevEl: '.st-partners-slider .swiper-button-prev',
		},
    });
});
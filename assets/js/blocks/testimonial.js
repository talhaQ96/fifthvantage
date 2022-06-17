$('.testimonial-slider').slick({
	arrows: false,
	dots: true,
	appendDots: $('.slider-title'),

	responsive: [
		{
			breakpoint: 992,
			settings: {
				appendDots: $('.testimonial-slider')
			}
		}
	]
});
function benefitMobileOnlySlider(){
	$('.benefits-slider').slick({
		slidesToShow: 2,
		slidesToScroll: 2,
  		prevArrow: '<svg style="left:  0" class="arrow-rect arrow-left" xmlns="http://www.w3.org/2000/svg" data-name="left arrow" width="36" height="36" viewBox="0 0 36 36"><rect id="Rectangle_146" data-name="Rectangle 146" width="36" height="36" fill="#febe0f"/><path id="Path_647" data-name="Path 647" d="M1.668,4.666l.99-.572.05-.029.542-.313.542-.313.059-.034.958-.553.066-.038L5.416,2.5l.292-.169,1.57-.907.3-.175.308-.178L8.251.865,8.666.625,9.083.384,9.749,0l.542.313.542.313.42.242.243.14.42.242.42.242,1.426.823.321.185.542.313.3.172.685.4.1.058.542.313.542.313.1.058.884.51.1.057,1.625.938L18.415,8.877l-.542-.313-.542-.313-.542-.313-.542-.313-.542-.313L15.165,7l-.511-.3-.145-.084-.427-.246-.542-.313L13,5.75l-.542-.313-.2-.113-.411-.238-.477-.275L10.832,4.5l-.542-.313-.542-.313-.542.313L8.666,4.5l-.542.313-.542.313-.542.313L6.5,5.75l-.54.312-.007,0-.537.31-.542.313L4.333,7l-.542.313-.542.313-.542.313-.534.308-.017.01-.532.307-.542.313L0,5.629,1.625,4.69Z" transform="translate(13.004 27.215) rotate(-90)" fill="#1c283f"/></svg>',
  		nextArrow: '<svg style="right: 0" class="arrow-rect arrow-right" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><g data-name="right arrow" transform="translate(-350 -1506)"><rect id="Rectangle_146" data-name="Rectangle 146" width="36" height="36" transform="translate(350 1506)" fill="#febe0f"/><path id="Path_647" data-name="Path 647" d="M1.668,4.211l.99.572.05.029.542.313.542.313.059.034.958.553.066.038.542.313.292.169,1.57.907.3.175.308.178.361.208.414.239.418.241.666.384.542-.313.542-.313.42-.242.243-.14.42-.242.42-.242,1.426-.823.321-.185.542-.313.3-.172.685-.4.1-.058.542-.313.542-.313.1-.058.884-.51.1-.057L19.5,3.248,18.415,0l-.542.313-.542.313L16.79.938l-.542.313-.542.313-.542.313-.511.3-.145.084-.427.246-.542.313L13,3.127l-.542.313-.2.113-.411.238-.477.275-.542.313-.542.313L9.749,5,9.207,4.69l-.542-.313-.542-.313-.542-.313L7.041,3.44,6.5,3.127l-.54-.312-.007,0L5.416,2.5l-.542-.313-.542-.313-.542-.313L3.25,1.251,2.708.938,2.174.63,2.157.62,1.625.313,1.083,0,0,3.248l1.625.938Z" transform="translate(364.12 1533.215) rotate(-90)" fill="#1c283f"/></g></svg>',

  		responsive: [
  			{
  				breakpoint: 576,
  				settings: {
  					slidesToShow: 1,
  					slidesToScroll: 1
  				}
  			}
  		]
	});
}

if(window.innerWidth < 768) {
	benefitMobileOnlySlider();
}

$(window).resize(function(e){
    if(window.innerWidth < 768) {
        if(!$('.benefits-slider').hasClass('slick-initialized')){
            benefitMobileOnlySlider();
        }
    }

    else{
        if($('.benefits-slider').hasClass('slick-initialized')){
            $('.benefits-slider').slick('unslick');
        }
    }
});

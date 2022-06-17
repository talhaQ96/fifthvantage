/**
 *  Slick Slider with Multislide Adaptive Height
 *  -------------------------------------------------
 */

// my slick slider options
var options = {
  slidesToShow: 4,
  slidesToScroll: 4,
  prevArrow: '<svg class="arrow-rect" xmlns="http://www.w3.org/2000/svg" id="left_arrow" data-name="left arrow" width="36" height="36" viewBox="0 0 36 36" style="left: 0"><rect id="Rectangle_146" data-name="Rectangle 146" width="36" height="36" fill="#febe0f"/><path id="Path_647" data-name="Path 647" d="M1.668,4.666l.99-.572.05-.029.542-.313.542-.313.059-.034.958-.553.066-.038L5.416,2.5l.292-.169,1.57-.907.3-.175.308-.178L8.251.865,8.666.625,9.083.384,9.749,0l.542.313.542.313.42.242.243.14.42.242.42.242,1.426.823.321.185.542.313.3.172.685.4.1.058.542.313.542.313.1.058.884.51.1.057,1.625.938L18.415,8.877l-.542-.313-.542-.313-.542-.313-.542-.313-.542-.313L15.165,7l-.511-.3-.145-.084-.427-.246-.542-.313L13,5.75l-.542-.313-.2-.113-.411-.238-.477-.275L10.832,4.5l-.542-.313-.542-.313-.542.313L8.666,4.5l-.542.313-.542.313-.542.313L6.5,5.75l-.54.312-.007,0-.537.31-.542.313L4.333,7l-.542.313-.542.313-.542.313-.534.308-.017.01-.532.307-.542.313L0,5.629,1.625,4.69Z" transform="translate(13.004 27.215) rotate(-90)" fill="#1c283f"/></svg>',
  nextArrow: '<svg class="arrow-rect" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" style="right: 0"><g id="right_arrow" data-name="right arrow" transform="translate(-350 -1506)"><rect id="Rectangle_146" data-name="Rectangle 146" width="36" height="36" transform="translate(350 1506)" fill="#febe0f"/><path id="Path_647" data-name="Path 647" d="M1.668,4.211l.99.572.05.029.542.313.542.313.059.034.958.553.066.038.542.313.292.169,1.57.907.3.175.308.178.361.208.414.239.418.241.666.384.542-.313.542-.313.42-.242.243-.14.42-.242.42-.242,1.426-.823.321-.185.542-.313.3-.172.685-.4.1-.058.542-.313.542-.313.1-.058.884-.51.1-.057L19.5,3.248,18.415,0l-.542.313-.542.313L16.79.938l-.542.313-.542.313-.542.313-.511.3-.145.084-.427.246-.542.313L13,3.127l-.542.313-.2.113-.411.238-.477.275-.542.313-.542.313L9.749,5,9.207,4.69l-.542-.313-.542-.313-.542-.313L7.041,3.44,6.5,3.127l-.54-.312-.007,0L5.416,2.5l-.542-.313-.542-.313-.542-.313L3.25,1.251,2.708.938,2.174.63,2.157.62,1.625.313,1.083,0,0,3.248l1.625.938Z" transform="translate(364.12 1533.215) rotate(-90)" fill="#1c283f"/></g></svg>',

  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },

    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },

    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  ]
};


// my slick slider as constant object
const cardSlider = $('.cards-slider').on('init', function(slick) {

  // on init run our multi slide adaptive height function
  multiSlideAdaptiveHeight(this);

}).on('beforeChange', function(slick, currentSlide, nextSlide) {

  // on beforeChange run our multi slide adaptive height function
  multiSlideAdaptiveHeight(this);

}).slick(options);


// our multi slide adaptive height function passing slider object
function multiSlideAdaptiveHeight(slider) {

  // set our vars
  let activeSlides = [];
  let tallestSlide = 0;

  // very short delay in order for us get the correct active slides
  setTimeout(function() {

    // loop through each active slide for our current slider
    $('.slick-track .slick-active', slider).each(function(item) {

      // add current active slide height to our active slides array
      activeSlides[item] = $(this).outerHeight();

    });

    // for each of the active slides heights
    activeSlides.forEach(function(item) {

      // if current active slide height is greater than tallest slide height
      if (item > tallestSlide) {

        // override tallest slide height to current active slide height
        tallestSlide = item;

      }

    });

    // set the current slider slick list height to current active tallest slide height
    $('.slick-list', slider).height(tallestSlide);

  }, 10);

}

// when window is resized
$(window).on('resize', function() {

  // run our multi slide adaptive height function incase current slider active slides change height responsively
  multiSlideAdaptiveHeight(cardSlider);

});
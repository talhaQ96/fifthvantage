$('.bio-slider ul').slick({
	arrows: false,
	dots: true,
	adaptiveHeight: true,
  	autoplay: false,
  	autoplaySpeed: 2000,
});

let readButton = findElement('readmore', 'id');
let dropdown   = findElement('readmore-text', 'id');

readButton.addEventListener('click', () => {

	if(!dropdown.classList.contains('active')){
		slideDown(dropdown);

		readButton.innerHTML = 'Show Less';
	}

	else{
		slideUp(dropdown);

		readButton.innerHTML = 'Read More';
	}
});
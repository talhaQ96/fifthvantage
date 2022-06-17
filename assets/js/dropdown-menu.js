/**
 *	Functions
 **/

function slideDown (element){
	element.classList.add('active');
   element.style.height = 'auto';
   element.style.visibility = 'visible';

   let height = element.clientHeight + "px";

   element.style.height = '0px';

   setTimeout( () => {
      element.style.height = height;
   },0);

   setTimeout( () => {
      element.style.height = 'auto';
   },301);
}

function slideUp (element){
	let height = element.clientHeight + "px";

	element.classList.remove('active');
	element.style.visibility = 'hidden';
	element.style.height = height;

   setTimeout( () => {
      element.style.height = '0px';
   },0);
}

function findElement (element, getElementBy, findAll){

	if (getElementBy == 'id'){
		var foundElement = document.getElementById(element);
	}

	else{

		if(findAll == true){
			var foundElement = document.querySelectorAll(element);
		}

		else{
			var foundElement =  document.querySelector(element);
		}

	}

	return foundElement;
}

/**
 *	Mobile Menu Dropdown
 **/

let hamIcon        = findElement('ham-icon-wrap', 'id');
let mobileDropdown = findElement('overlay-menu', 'id');
let hamIconInner	 = findElement('#ham-icon-wrap .ham-icon');

hamIcon.addEventListener('click', () => {
	if(!mobileDropdown.classList.contains('active')){

		slideDown(mobileDropdown);

		hamIconInner.classList.add('open');
		
	}

	else{
		slideUp(mobileDropdown);
		hamIconInner.classList.remove('open');
	}
});

/**
 *	Mobile Menu (First Level) Dropdown
 **/

var menuItemLevel_01 = findElement("#overlay-menu nav #primary-menu li.menu-item-has-children", '', true);

for(let i = 0; i < menuItemLevel_01.length; i++){

	menuItemLevel_01[i].addEventListener('click', () => {
			let clickedItem = menuItemLevel_01[i];

			let dropdown = clickedItem.querySelector('ul');

			let activeElement = findElement("#overlay-menu nav #primary-menu li.menu-item-has-children > ul.active");

			// close all dropdowns
			if(activeElement != null && !dropdown.classList.contains('active')){
	
				slideUp(activeElement);
	
			}

			// if clicked dropdown element is closed then SlideDown
			if (!dropdown.classList.contains('active')){
	
				clickedItem.classList.add('dropdown');
				slideDown(dropdown);
	
			}

			// if clicked dropdown element is open then SlideUp
			else{
				clickedItem.classList.remove('dropdown');
				slideUp(dropdown);
			}
	});
}

// Search Box

let magnifier = findElement('header .magnifier');
let searchBox = findElement('header .search-box');

magnifier.addEventListener('click', () => {
	if(magnifier.classList.contains('active')){
		searchBox.style.opacity = 0;
		searchBox.style.visibility = 'hidden';
		magnifier.classList.remove('active');
	}

	else{
		searchBox.style.opacity = 1;
		searchBox.style.visibility = 'visible';
		magnifier.classList.add('active');
	}
});

let magnifierMobile = findElement('header .mobile-navigation .magnifier');

magnifierMobile.addEventListener('click', () => {
	if(magnifierMobile.classList.contains('active')){
		searchBox.style.opacity = 0;
		searchBox.style.visibility = 'hidden';
		magnifierMobile.classList.remove('active');
	}

	else{
		searchBox.style.opacity = 1;
		searchBox.style.visibility = 'visible';
		magnifierMobile.classList.add('active');
	}
});
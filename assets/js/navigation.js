(function () {
	'use strict';
	var button = document.querySelector('.menu-toggle');
	var menu = document.querySelector('.primary-nav');
	if (!button || !menu) return;
	button.addEventListener('click', function () {
		var expanded = button.getAttribute('aria-expanded') === 'true';
		button.setAttribute('aria-expanded', String(!expanded));
		menu.classList.toggle('is-open', !expanded);
	});
	menu.addEventListener('click', function (event) {
		if (event.target.closest('a')) {
			button.setAttribute('aria-expanded', 'false');
			menu.classList.remove('is-open');
		}
	});
}());

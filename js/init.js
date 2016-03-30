window.addEventListener('load', function() {
	var event_init = new Event('init');

	// i18n init
	var option = {
		resGetPath: 'locales/__ns_____lng__.json',
		fallbackLng: 'en'
	};

	i18n.init(option, function() {
		[].forEach.call(document.querySelectorAll('[data-i18n]'), function(element) {
			if (element.dataset.i18n != i18n.t(element.dataset.i18n)) {
				element.innerHTML = i18n.t(element.dataset.i18n);
			}
		});

		document.title = i18n.t('app.title', {appName: i18n.t('app.name')});

		document.dispatchEvent(event_init);
	});

});

window.addEventListener('load', function() {
	var event_init = new Event('init');

	// i18n init
	var option = {
		load: 'languageOnly',
		fallbackLng: 'en',
		backend: {
			loadPath: 'locales/{{ns}}_{{lng}}.json'
		}
	};

	i18next
		.use(i18nextXHRBackend)
		.use(i18nextBrowserLanguageDetector)
		.init(option, function(err, t) {
			[].forEach.call(document.querySelectorAll('[data-i18n]'), function(element) {
				if (element.dataset.i18n != t(element.dataset.i18n)) {
					element.innerHTML = t(element.dataset.i18n);
				}
			});

			document.title = t('app.title', {appName: t('app.name')});

			document.dispatchEvent(event_init);
	});

});

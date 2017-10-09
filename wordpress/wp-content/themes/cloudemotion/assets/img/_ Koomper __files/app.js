var koomper = angular.module("mainapp",[
	'ui.router',
	'ngResource',
	'ui.bootstrap',
	'ngTable',
	'pascalprecht.translate',
	'froala',
	'ngFlag',
	'paypal-button',
	'pnotify',
	]).value('froalaConfig', {
		toolbarInline: false,
		placeholderText: 'Ingresa el texto aqui'
	})
	//.constant('ENDPOINT', 'http://developer.koomper.com/api/v0/')
	//.constant('ENDPOINT', 'https://admin.koomper.com/api/v0/')
	//.constant('ENDPOINT', 'http://192.168.1.102:8000/api/v0/')
	.constant('ENDPOINT', 'https://admin.koomper.com/api/v0/')
	//.constant('ENDPOINT', 'https://admin.koomper.com/api/v0/')
	.constant('BASE', 'https://admin.koomper.com/')

	.constant('UserData',{});



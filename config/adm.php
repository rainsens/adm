<?php

return [
	'name' => 'Adm',
	
	'logo' => '<b>ADM</b> Administration',
	
	'logo-mini' => '<b>ADM</b>',
	
	/*
    |--------------------------------------------------------------------------
    | Adm Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */
	
	'dir' => 'adm',
	
	'namespace' => [
		'name' => 'Adm',
		'value' => 'adm/'
	],
	
	'bootstrap' => '',
	
	'route' => [
		'prefix' => env('ADM_ROUTE_PREFIX', 'adm'),
		'namespace' => 'Adm\\Http\\Controllers',
		'middleware' => ['web']
	],
	
	'title' => 'Adm-Administration',
	
];

<?php

return [
	'name' => 'Adm',
	
	'logo' => '<b>ADM</b> Administration',
	
	'logo-mini' => '<b>ADM</b>',
	
	'dir' => base_path('adm'),
	
	'bootstrap' => '',
	
	'route' => [
		'prefix' => env('ADM_ROUTE_PREFIX', 'adm'),
		'namespace' => 'Adm\\Controllers',
		'middleware' => ['web', 'adm']
	],
	
	'title' => 'Adm-Administration'
];

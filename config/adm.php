<?php

return [
	'name' => 'Adm',
	
	'logo' => '<b>ADM</b> Administration',
	
	'logo-mini' => '<b>ADM</b>',
	
	'dir' => base_path('adm'),
	
	'bootstrap' => '',
	
	'route' => [
		'prefix' => env('ADM_ROUTE_PREFIX', 'adm'),
		'namespace' => 'Adm\\Http\\Controllers',
		'middleware' => ['web']
	],
	
	'title' => 'Adm-Administration'
];

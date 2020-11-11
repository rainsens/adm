<?php

return [
	'name' => 'Adm',
	
	'logo' => '<b>ADM</b> Administration',
	
	'logo-mini' => '<b>ADM</b>',
	
	'dir' => 'adm',
	
	'bootstrap' => '',
	
	'route' => [
		'prefix' => env('ADM_ROUTE_PREFIX', 'adm'),
		'namespace' => 'Adm\\Http\\Controllers',
		'middleware' => ['web']
	],
	
	'title' => 'Adm-Administration'
];

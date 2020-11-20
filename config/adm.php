<?php

return [
	'name' => 'Adm',
	
	'logo' => '<b>Rainsen</b> Adm',
	
	'logo-mini' => '<b>ADM</b>',
	
	'title' => 'Rainsen - Adm',
	
	'route' => [
		'prefix' => 'adm',
		'namespace' => 'Adm\\Http\\Controllers', // namespace for client.
		'middleware' => ['web'],
	],
	
	'auth' => [
		
		'guards' => [
			'adm' => [
				'driver' => 'session',
				'provider' => 'adm',
			]
		],
		
		'providers' => [
			'adm' => [
				'driver' => 'eloquent',
				'model' => \Rainsens\Adm\Models\AdmUser::class,
			]
		],
		
		'passwords' => [
			'adm' => [
				'provider' => 'adm',
				'table' => 'adm_password_resets',
				'expire' => 60,
				'throttle' => 60,
			],
		],
	],
	
	'adm_path' => base_path('adm'),
	'adm_public_path' => public_path('vendor/adm'),
];

<?php

return [
	'name' => 'Adm',
	
	'logo' => '<b>Rainsen</b> Adm',
	
	'logo-mini' => '<b>ADM</b>',
	
	'title' => 'Rainsen - Adm',
	
	'auth' => [
		
		'default_guard' => 'adm',
		
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
		]
	]
];

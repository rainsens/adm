<?php

if (! function_exists('adm_base_path')) {
	
	function adm_base_path($path = '') {
		return __DIR__ . '/../' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('adm_path')) {
	
	function adm_path($path = '') {
		return config('adm.dir') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}


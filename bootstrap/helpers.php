<?php

if (! function_exists('adm_path')) {
	
	function adm_path($path = '') {
		return config('adm.dir') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

<?php

/**
 * ---------------------------------------------------------------------------------------------------------------------
 * For end user.
 * ---------------------------------------------------------------------------------------------------------------------
 */
if (! function_exists('adm_path'))
{
	/**
	 * Get the path to adm folder.
	 * @param string $path
	 * @return string
	 */
	function adm_path($path = '') {
		return config('adm.dir') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('adm_controller_path')) {
	/**
	 * Get the path to controllers folder.
	 * @param string $path
	 * @return string
	 */
	function adm_controller_path($path = '') {
		return adm_path('Http/Controllers') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('adm_route_path')) {
	/**
	 * Get the path to route folder.
	 * @param string $path
	 * @return string
	 */
	function adm_route_path($path = '') {
		return adm_path('routes') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}


/**
 * ---------------------------------------------------------------------------------------------------------------------
 * For vendor below.
 * ---------------------------------------------------------------------------------------------------------------------
 */

if (! function_exists('_base_path')) {
	/**
	 * Get the path to adm folder of vendor.
	 * @param string $path
	 * @return string
	 */
	function _base_path($path = '') {
		return __DIR__ . '/../' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('_config_path')) {
	/**
	 * Get the path to adm/src/config folder.
	 * @param $path
	 * @return string
	 */
	function _config_path($path = '') {
		return _base_path('config') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('_console_path')) {
	/**
	 * Get the path to adm/src/Console folder of vendor.
	 * @param string $path
	 * @return string
	 */
	function _console_path($path = '') {
		return _base_path('src/Console/stubs') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('_stub_path')) {
	/**
	 * Get the path to stubs folder of vendor.
	 * @param string $path
	 * @return string
	 */
	function _stub_path($path = '') {
		return _console_path('stubs') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('_resource_path')) {
	/**
	 * Get the path to resources folder.
	 * @param string $path
	 * @return string
	 */
	function _resource_path($path = '') {
		return _base_path('resources') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('_database_path')) {
	/**
	 * Get the path to database folder.
	 * @param string $path
	 * @return string
	 */
	function _database_path($path = '') {
		return _base_path('database') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

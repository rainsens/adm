<?php

if (! function_exists('recursive_order')) {
	
	function recursive_order(array $data, $parentField, $parentId = 0, $level = 0) {
		static $orderedData = [];
		foreach ($data as $key => $value) {
			if ($value[$parentField] === $parentId) {
				$value['level'] = $level;
				$orderedData[] = $value;
				unset($data[$key]);
				recursive_order($data, $parentField, $value['id'], $level+1);
			}
		}
		return $orderedData;
	}
}

if (! function_exists('select2data')) {
	
	function select2data(\Illuminate\Support\Collection $collection, string $textField) {
		
		$originalData = recursive_order($collection->toArray(), 'parent_id');
		
		$data[0] = ['id' => 0, 'text' => 'ROOT', 'html' => '┝ ROOT', 'title' => ''];
		
		foreach ($originalData as $value) {
			$prefix = '';
			for ($i = $value['level']; $i > 0; $i--) {
				$prefix .= '&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			$text = $value[$textField];
			$html = $prefix.'┝ '.$text;
			$data[] = ['id' => $value['id'], 'text' => $text, 'html' => $html, 'title' => ''];
		}
		return $data;
	}
}


/**
 * ---------------------------------------------------------------------------------------------------------------------
 * Path for end user.
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
		return base_path(config('adm.dir') ?? 'adm') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
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
 * Path for vendor below.
 * ---------------------------------------------------------------------------------------------------------------------
 */

if (! function_exists('_base_path')) {
	/**
	 * Get the path to adm folder of vendor.
	 * @param string $path
	 * @return string
	 */
	function _base_path($path = '') {
		return __DIR__ . '/../' . $path;
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
		return _base_path('src/Console') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
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

if (! function_exists('_public_path')) {
	/**
	 * Get the path to public folder.
	 * @param string $path
	 * @return string
	 */
	function _public_path($path = '') {
		return _base_path('public') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
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


if (! function_exists('_test_path')) {
	/**
	 * Get the path to tests folder.
	 * @param string $path
	 * @return string
	 */
	function _test_path($path = '') {
		return _base_path('tests') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

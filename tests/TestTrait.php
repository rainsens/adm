<?php
namespace Rainsens\Adm\Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

trait TestTrait
{
	public function publishConfigFile()
	{
		Artisan::call('vendor:publish', [
			'--provider' => "Rainsens\Adm\Providers\AdmServiceProvider",
			'--tag' => "config"
		]);
	}
	
	public function removeConfigFile()
	{
		if (File::exists(config_path('adm.php'))) {
			unlink(config_path('adm.php'));
		}
	}
	
	public function publishRouteFile()
	{
		Artisan::call('vendor:publish', [
			'--provider' => "Rainsens\Adm\Providers\AdmServiceProvider",
			'--tag' => "route"
		]);
	}
	
	public function removeRouteFile()
	{
		if (File::exists(adm_path('routes/web.php'))) {
			unlink(adm_path('routes/web.php'));
		}
	}
	
	public function removeAdmDirectory()
	{
		if (File::isDirectory(adm_path())) {
			File::deleteDirectory(adm_path());
		}
	}
}

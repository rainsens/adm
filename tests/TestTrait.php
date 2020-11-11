<?php
namespace Rainsens\Adm\Tests;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

trait TestTrait
{
	public function initTestEnvironment()
	{
		$this->cleanTestEnvironment();
		$this->createTestEnviroment();
	}
	
	public function cleanTestEnvironment()
	{
		$this->removeConfigFile();
		$this->removeAdmDirectory();
	}
	
	public function createTestEnviroment()
	{
		Artisan::call('adm:install');
	}
	
	public function removeConfigFile()
	{
		if (File::exists(config_path('adm.php'))) {
			File::delete(config_path('adm.php'));
		}
	}
	
	public function removeAdmDirectory()
	{
		if (File::isDirectory(adm_path())) {
			File::deleteDirectory(adm_path());
		}
	}
}

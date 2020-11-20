<?php
namespace Rainsens\Adm\Tests;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Rainsens\Adm\Contracts\ComposerContract;

trait TestTrait
{
	private $admNameSpaceForTest = 'Adm\\';
	private $admNameSpaceValueInPackage = 'vendor/orchestra/testbench-core/laravel/adm/';
	private $admNameSpaceValueInTestLaravel = 'adm/';
	
	public function initTestEnvironment()
	{
		if (! File::exists(adm_route_path('web.php'))) {
			
			$this->createTestNamespace();
			
			Artisan::call('adm:config');
			
			$this->setConfig();
			
			Artisan::call('adm:install');
			
		} else {
			
			Artisan::call('adm:uninstall');
			
			$this->removeTestNamespace();
			$this->createTestNamespace();
			
			Artisan::call('adm:config');
			
			$this->setConfig();
			
			Artisan::call('adm:install');
		}
	}
	
	private function setConfig()
	{
		$admConfig = require _config_path('adm.php');
		
		$this->app['config']->set('adm', $admConfig);
		
		config(["auth.guards.adm" => config('adm.auth.guards.adm')]);
		config(['auth.providers.adm' => config('adm.auth.providers.adm')]);
		config(['auth.passwords.adm' => config('adm.auth.passwords.adm')]);
	}
	
	private function createTestNamespace()
	{
		$path = _base_path('composer.json');
		$composer = app(ComposerContract::class);
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		$composer->setPsrFourItem($path, $this->admNameSpaceForTest, $this->admNameSpaceValueInPackage);
		
		$path = base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		$composer->setPsrFourItem($path, $this->admNameSpaceForTest, $this->admNameSpaceValueInTestLaravel);
	}
	
	private function removeTestNamespace()
	{
		$composer = app(ComposerContract::class);
		
		$path = _base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		
		$path = base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
	}
}

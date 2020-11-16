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
			$this->createNamespace();
			$this->runInstall();
			exit("================================ ADM TEST ===============================\nPrepared test environment. Please run 'phpunit' or 'composer test' again!\n-------------------------------------------------------------------------\n");
		} else {
			$this->cleanTestEnvironment();
			$this->createNamespace();
			$this->runInstall();
		}
	}
	
	private function cleanTestEnvironment()
	{
		$this->removeNamespace();
		$this->removeConfigFile();
		$this->removeAdmDirectory();
	}
	
	private function createNamespace()
	{
		$path = _base_path('composer.json');
		$composer = app(ComposerContract::class);
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		$composer->setPsrFourItem($path, $this->admNameSpaceForTest, $this->admNameSpaceValueInPackage);
		
		$path = base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		$composer->setPsrFourItem($path, $this->admNameSpaceForTest, $this->admNameSpaceValueInTestLaravel);
	}
	
	private function runInstall()
	{
		/**
		 * Command adm:install, install adm without database.
		 * because on environment uses the memory database for test.
		 * on production environment uses: adm:install --db
		 */
		Artisan::call('adm:install');
	}
	
	private function removeNamespace()
	{
		$composer = app(ComposerContract::class);
		
		$path = _base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		
		$path = base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
	}
	
	private function removeConfigFile()
	{
		if (File::exists(config_path('adm.php'))) {
			File::delete(config_path('adm.php'));
		}
	}
	
	private function removeAdmDirectory()
	{
		if (File::isDirectory(adm_path())) {
			File::deleteDirectory(adm_path());
			File::deleteDirectory(public_path('vendor/adm'));
		}
	}
}

<?php
namespace Rainsens\Adm\Tests;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Rainsens\Adm\Contracts\ComposerInterface;

trait TestTrait
{
	private $admNameSpaceForTest = 'Adm\\';
	private $admNameSpaceValueInPackage = 'vendor/orchestra/testbench-core/laravel/adm/';
	private $admNameSpaceValueInTestLaravel = 'adm/';
	
	public function initTestEnvironment()
	{
		$this->cleanTestEnvironment();
		$this->createNamespace();
		$this->runInstall();
	}
	
	public function cleanTestEnvironment()
	{
		$this->removeNamespace();
		$this->removeConfigFile();
		$this->removeAdmDirectory();
	}
	
	public function runInstall()
	{
		Artisan::call('adm:install');
	}
	
	public function createNamespace()
	{
		$path = _base_path('composer.json');
		$composer = app(ComposerInterface::class);
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		$composer->setPsrFourItem($path, $this->admNameSpaceForTest, $this->admNameSpaceValueInPackage);
		
		$path = base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		$composer->setPsrFourItem($path, $this->admNameSpaceForTest, $this->admNameSpaceValueInTestLaravel);
	}
	
	public function removeNamespace()
	{
		$composer = app(ComposerInterface::class);
		
		$path = _base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		
		$path = base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
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

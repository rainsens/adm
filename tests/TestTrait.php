<?php
namespace Rainsens\Adm\Tests;

use Illuminate\Support\Facades\Artisan;
use Rainsens\Adm\Contracts\ComposerContract;

trait TestTrait
{
	private $admNameSpaceForTest = 'Adm\\';
	private $admNameSpaceValueInPackage = 'vendor/orchestra/testbench-core/laravel/adm/';
	private $admNameSpaceValueInTestLaravel = 'adm/';
	
	public function initTestData()
	{
		Artisan::call('adm:uninstall');
		$this->removeTestNamespace();
		
		$this->createTestNamespace();
		Artisan::call('adm:config');
		Artisan::call('adm:install');
	}
	
	protected function createTestNamespace()
	{
		$path = _base_path('composer.json');
		$composer = app(ComposerContract::class);
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		$composer->setPsrFourItem($path, $this->admNameSpaceForTest, $this->admNameSpaceValueInPackage);
		
		$path = base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		$composer->setPsrFourItem($path, $this->admNameSpaceForTest, $this->admNameSpaceValueInTestLaravel);
	}
	
	protected function removeTestNamespace()
	{
		$composer = app(ComposerContract::class);
		
		$path = _base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
		
		$path = base_path('composer.json');
		$composer->removePsrFourItem($path, $this->admNameSpaceForTest);
	}
}

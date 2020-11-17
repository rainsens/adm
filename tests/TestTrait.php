<?php
namespace Rainsens\Adm\Tests;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Rainsens\Adm\Contracts\ComposerContract;
use Rainsens\Adm\Tests\Dummy\Models\User;

trait TestTrait
{
	private $admNameSpaceForTest = 'Adm\\';
	private $admNameSpaceValueInPackage = 'vendor/orchestra/testbench-core/laravel/adm/';
	private $admNameSpaceValueInTestLaravel = 'adm/';
	
	public function initTestEnvironment()
	{
		$this->app['config']->set('auth.providers.users.model', User::class);
		
		if (! File::exists(adm_route_path('web.php'))) {
			
			$this->createTestNamespace();
			
			Artisan::call('adm:publish');
			
			exit("================================ ADM TEST ===============================\nPrepared test environment. Please run 'phpunit' or 'composer test' again!\n-------------------------------------------------------------------------\n");
		
		} else {
			
			Artisan::call('adm:uninstall');
			
			$this->removeTestNamespace();
			$this->createTestNamespace();
			
			Artisan::call('adm:publish');
		}
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

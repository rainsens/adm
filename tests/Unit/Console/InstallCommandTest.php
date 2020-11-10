<?php
namespace Rainsens\Adm\Tests\Unit\Console;

use Illuminate\Support\Facades\Artisan;
use Rainsens\Adm\Tests\TestCase;
use Rainsens\Adm\Tests\TestTrait;

class InstallCommandTest extends TestCase
{
	use TestTrait;
	
	/** @test */
	public function test_install_command()
	{
		$this->removeConfigFile();
		$this->assertFileDoesNotExist(config_path('adm.php'));
		
		$this->removeAdmDirectory();
		$this->assertDirectoryDoesNotExist(adm_path());
		
		$this->removeRouteFile();
		$this->assertFileDoesNotExist(adm_path('routes/web.php'));
		
		Artisan::call('adm:install');
		
		$this->assertFileExists(config_path('adm.php'));
		$this->assertDirectoryExists(adm_path('Http/Controllers'));
		$this->assertFileExists(adm_path('routes/web.php'));
	}
}

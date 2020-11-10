<?php
namespace Rainsens\Adm\Tests\Unit\Console;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Rainsens\Adm\Tests\TestCase;

class InstallCommandTest extends TestCase
{
	/** @test */
	public function test_install_command()
	{
		if (File::exists(config_path('adm.php'))) {
			unlink(config_path('adm.php'));
		}
		$this->assertFileDoesNotExist(config_path('adm.php'));
		
		if (File::isDirectory(adm_path())) {
			File::deleteDirectory(adm_path());
		}
		
		$this->assertDirectoryDoesNotExist(adm_path());
		
		if (File::exists(adm_path('routes/web.php'))) {
			unlink(adm_path('routes/web.php'));
		}
		
		$this->assertFileDoesNotExist(adm_path('routes/web.php'));
		
		Artisan::call('adm:install');
		
		$this->assertFileExists(config_path('adm.php'));
		$this->assertDirectoryExists(adm_path('Http/Controllers'));
		$this->assertFileExists(adm_path('routes/web.php'));
	}
}

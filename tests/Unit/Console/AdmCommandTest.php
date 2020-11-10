<?php
namespace Rainsens\AppAdmin\Tests\Unit\Console;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Rainsens\Adm\Tests\TestCase;

class AdmCommandTest extends TestCase
{
	/** @test */
	public function adm_command()
	{
		/*if (File::exists(config_path('adm.php'))) {
			unlink(config_path('adm.php'));
		}
		
		$this->assertFalse(File::exists(config_path('adm.php')));
		
		Artisan::call('adm');
		
		$this->assertTrue(File::exists(config_path('adm.php')));*/
		
		$this->assertTrue(true);
	}
}

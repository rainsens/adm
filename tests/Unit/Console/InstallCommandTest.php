<?php
namespace Rainsens\Adm\Tests\Unit\Console;

use Illuminate\Support\Facades\File;
use Rainsens\Adm\Tests\TestCase;

class InstallCommandTest extends TestCase
{
	/** @test */
	public function test_install_command()
	{
		$this->withoutExceptionHandling();
		
		$this->assertTrue(File::exists(config_path('adm.php')));
		$this->assertTrue(File::isDirectory(adm_controller_path()));
		$this->assertTrue(File::isDirectory(adm_route_path()));
		$this->assertTrue(File::exists(adm_route_path('web.php')));
	}
}

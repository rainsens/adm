<?php
namespace Rainsens\AppAdmin\Tests\Unit\Console;

use Rainsens\Adm\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class AdmCommandTest extends TestCase
{
	/** @test */
	public function test_adm_command()
	{
		Artisan::call('adm');
		$this->assertTrue(true);
	}
}

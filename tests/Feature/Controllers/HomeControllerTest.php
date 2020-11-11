<?php
namespace Rainsens\Adm\Tests\Feature\Controllers;

use Rainsens\Adm\Tests\TestCase;

class HomeControllerTest extends TestCase
{
	/** @test */
	public function can_see_home_controller()
	{
		$this->withoutExceptionHandling();
		
		$this->initTestEnvironment();
		
		$this->get(route('adm.home'))
			->assertStatus(200);
	}
}

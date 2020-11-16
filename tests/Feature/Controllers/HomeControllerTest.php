<?php
namespace Rainsens\Adm\Tests\Feature\Controllers;

use Rainsens\Adm\Tests\TestCase;

class HomeControllerTest extends TestCase
{
	/** @test */
	public function guest_cannot_see_home_controller()
	{
		$this->withoutExceptionHandling();
		
		$this->get(route('adm.home'))
			->assertRedirect(route('adm.login'))
			->assertStatus(302);
	}
}

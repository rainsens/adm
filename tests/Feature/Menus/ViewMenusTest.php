<?php
namespace Rainsens\Adm\Tests\Feature\Menus;

use Rainsens\Adm\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewMenusTest extends TestCase
{
	use RefreshDatabase;
	
	/** @test */
	public function guest_cannot_see_menus()
	{
		$this->assertFalse(auth()->check());
		
		$this->get(route('adm.menus.index'))
			->assertRedirect(route('adm.login'))
			->assertStatus(302);
	}
	
	/** @test */
	public function admin_can_see_menus()
	{
		$admUser = createAdmUser();
		$this->actingAs($admUser);
		
		$this->assertTrue(auth()->check());
		
		$this->get(route('adm.menus.index'))
			->assertStatus(200);
	}
	
}

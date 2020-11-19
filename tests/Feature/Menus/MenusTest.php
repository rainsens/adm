<?php
namespace Rainsens\Adm\Tests\Feature\Menus;

use Rainsens\Adm\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenusTest extends TestCase
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
	
	/** @test */
	public function can_update_menus_order()
	{
		$admUser = createAdmUser();
		$this->actingAs($admUser);
		
		$this->post(route('adm.menus.order'), [
			'data' => '[{"id":1},{"id":2,"children":[{"id":3},{"id":4},{"id":5},{"id":6},{"id":7}]}]'
		])
			->assertStatus(201);
	}
	
}

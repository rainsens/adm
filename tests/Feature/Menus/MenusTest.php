<?php
namespace Rainsens\Adm\Tests\Feature\Menus;

use Rainsens\Adm\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenusTest extends TestCase
{
	use RefreshDatabase;
	
	/** @test */
	public function can_see_menus()
	{
		$this->login();
		
		$this->assertTrue(auth()->check());
		
		$this->get(route('adm.menus.index'))
			->assertStatus(200);
	}
	
	/** @test */
	public function can_update_menus_order()
	{
		$this->withoutExceptionHandling();
		
		$this->login();
		
		$this->post(route('adm.menus.order'), [
			'data' => [
				["id" => 1],
				[
					"id" => 2,
					"children" => [
						["id" => 3],
						["id" => 4],
						["id" => 5],
						["id" => 6],
						["id" => 7]
					]
				]
			]
		])
			->assertStatus(201);
	}
	
}

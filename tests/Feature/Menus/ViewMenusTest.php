<?php
namespace Rainsens\Adm\Tests\Feature\Menus;

use Rainsens\Adm\Tests\TestCase;

class ViewMenusTest extends TestCase
{
	/** @test */
	public function can_see_all_menus()
	{
		$this->initTestEnvironment();
		
		$this->get(route('adm.menus.index'))
			->assertStatus(200);
	}
}

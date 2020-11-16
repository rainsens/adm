<?php
namespace Rainsens\Adm\Tests\Feature\Menus;

use Rainsens\Adm\Tests\TestCase;

class ViewMenusTest extends TestCase
{
	/** @test */
	public function guest_cannot_see_menus()
	{
		$this->get(route('adm.menus.index'))
			->assertRedirect(route('adm.login'))
			->assertStatus(302);
	}
}

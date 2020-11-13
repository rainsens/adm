<?php
namespace Rainsens\Adm\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Rainsens\Adm\Tests\TestCase;
use Rainsens\Adm\Models\Menu;

class MenuTest extends TestCase
{
	use RefreshDatabase;
	
	/** @test */
	public function a_menu_has_a_name()
	{
		$menu = factory(Menu::class)->create(['name' => 'Dashboard']);
		$this->assertEquals('Dashboard', $menu->name);
	}
}

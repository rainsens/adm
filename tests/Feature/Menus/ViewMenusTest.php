<?php
namespace Rainsens\Adm\Tests\Feature\Menus;

use Rainsens\Adm\Tests\TestCase;
use Rainsens\Adm\Tests\TestTrait;

class ViewMenusTest extends TestCase
{
	use TestTrait;
	
	/** @test */
	public function can_see_all_menus()
	{
		$this->withoutExceptionHandling();
		
		$this->removeRouteFile();
		$this->assertFileDoesNotExist(adm_path('routes/web.php'));
		
		$this->publishRouteFile();
		$this->assertFileExists(adm_path('routes/web.php'));
		
		$this->get(route('adm.menus.index'))
			->assertStatus(200);
	}
}

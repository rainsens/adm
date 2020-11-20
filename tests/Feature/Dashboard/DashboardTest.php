<?php
namespace Rainsens\Adm\Tests\Feature\Dashboard;

use Rainsens\Adm\Models\AdmUser;
use Rainsens\Adm\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
	use RefreshDatabase;
	
	/** @test */
	public function guest_cannot_see_dashboard()
	{
		$this->withoutExceptionHandling();
		
		$this->get(route('adm.home'))
			->assertRedirect(route('adm.login'))
			->assertStatus(302);
	}
	
	/** @test */
	public function member_can_see_home_dashboard()
	{
		$this->login();
		
		$this->get(route('adm.home'))
			->assertStatus(200);
	}
}

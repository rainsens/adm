<?php
namespace Rainsens\Adm\Tests\Feature\Dashboard;

use Rainsens\Adm\Tests\Dummy\Models\User;
use Rainsens\Adm\Tests\TestCase;

class DashboardTest extends TestCase
{
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
		$user = factory(User::class)->create();
		
		$this->actingAs($user)
			->get(route('adm.home'))
			->assertStatus(200);
	}
}

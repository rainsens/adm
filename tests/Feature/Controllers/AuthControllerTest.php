<?php
namespace Rainsens\Adm\Tests\Feature\Controllers;

use Rainsens\Adm\Tests\Dummy\Models\User;
use Rainsens\Adm\Tests\TestCase;

class AuthControllerTest extends TestCase
{
	/** @test */
	public function guest_can_see_login_page()
	{
		$this->withoutExceptionHandling();
		
		$this->get(route('adm.login'))
			->assertStatus(200);
	}
	
	/** @test */
	public function authenticated_user_cannot_see_login_page()
	{
		$user = factory(User::class)->create();
		
		$this->actingAs($user)->get(route('adm.login'))
			->assertRedirect(route('adm.home'))
			->assertStatus(302);
	}
	
	/** @test  */
	public function login_name_is_required()
	{
		$this->post(route('adm.store'), [
			'name' => null,
			'password' => '12345'
		])
			->assertRedirect()
			->assertStatus(302)
			->assertSessionHasErrors('name');
	}
	
	/** @test */
	public function login_password_is_required()
	{
		
	}
}

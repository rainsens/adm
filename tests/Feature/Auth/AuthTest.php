<?php
namespace Rainsens\Adm\Tests\Feature\Auth;

use Rainsens\Adm\Models\AdmUser;
use Rainsens\Adm\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
	use RefreshDatabase;
	
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
		$this->login();
		
		$this->get(route('adm.login'))
			->assertRedirect(route('adm.home'))
			->assertStatus(302);
	}
	
	/** @test  */
	public function login_name_is_required()
	{
		$this->post(route('adm.login.store'), [
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
		$this->post(route('adm.login.store'), [
			'name' => 'rainsen',
			'password' => null,
		])
			->assertRedirect()
			->assertStatus(302)
			->assertSessionHasErrors('password');
	}
	
	/** @test */
	public function guest_cannot_login_in()
	{
		$this->withoutExceptionHandling();
		
		$this->post(route('adm.login'), [
			'name' => 'guest',
			'password' => 'guest',
		])
			->assertRedirect()
			->assertStatus(302)
			->assertSessionHas('danger');
	}
	
	/** @test */
	public function administrator_can_login_in()
	{
		$adm = createAdmUser(['name' => 'Susan']);
		
		$this->post(route('adm.login'), [
			'name' => $adm->name,
			'password' => 'adm',
		])
			->assertRedirect(route('adm.home'))
			->assertStatus(302)
			->assertSessionHas('success');
	}
	
	/** @test */
	public function administrator_can_logout()
	{
		$this->login();
		$this->delete(route('adm.logout'))
			->assertRedirect(route('adm.login'));
	}
}

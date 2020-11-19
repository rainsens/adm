<?php
namespace Rainsens\Adm\Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Rainsens\Adm\Tests\Dummy\Models\User;
use Rainsens\Adm\Tests\TestCase;

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
		$user = factory(User::class)->create();
		
		$this->actingAs($user)->get(route('adm.login'))
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
		
		$authkind = 'normal';
		$name = 'Wood';
		
		$guest = factory(User::class)->create([
			'authkind' => $authkind,
			'name' => $name,
		]);
		
		$this->post(route('adm.login'), [
			'name' => $guest->name,
			'password' => 'admin',
		])
			->assertRedirect()
			->assertStatus(302)
			->assertSessionHas('danger');
	}
	
	/** @test */
	public function administrator_can_login_in()
	{
		$authkind = 'adm';
		$name = 'Wood';
		
		$admin = factory(User::class)->create([
			'authkind' => $authkind,
			'name' => $name,
		]);
		
		$this->post(route('adm.login'), [
			'name' => $admin->name,
			'password' => 'admin',
		])
			->assertRedirect(route('adm.home'))
			->assertStatus(302)
			->assertSessionHas('success');
	}
	
	/** @test */
	public function administrator_can_logout()
	{
		$authkind = 'adm';
		$name = 'Wood';
		
		$admin = factory(User::class)->create([
			'authkind' => $authkind,
			'name' => $name,
		]);
		
		$this->actingAs($admin)
			->delete(route('adm.logout'))
			->assertRedirect(route('adm.login'));
	}
}

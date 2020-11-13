<?php
namespace Rainsens\Adm\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Rainsens\Adm\Tests\Dummy\Models\User;
use Rainsens\Adm\Tests\TestCase;

class UserTest extends TestCase
{
	use RefreshDatabase;
	
	/** @test */
	public function user_table_has_authkind_field()
	{
		factory(User::class)->create([
			'name' => 'Rainsen',
			'authkind' => 'normal',
		]);
		
		$this->assertDatabaseHas('users', [
			'name' => 'Rainsen',
			'authkind' => 'normal',
		]);
		
		$this->assertDatabaseMissing('users', [
			'name' => 'Rainsen',
			'authkind' => 'admin',
		]);
	}
}

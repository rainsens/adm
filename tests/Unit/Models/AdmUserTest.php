<?php
namespace Rainsens\Adm\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Rainsens\Adm\Models\AdmUser;
use Rainsens\Adm\Tests\TestCase;

class AdmUserTest extends TestCase
{
	use RefreshDatabase;
	
	/** @test */
	public function a_adm_user_has_a_name()
	{
		$admUser = create(AdmUser::class, ['name' => 'Rainsen']);
		
		$this->assertEquals('Rainsen', $admUser->name);
	}
	
	/** @test */
	public function a_adm_user_has_a_password()
	{
		$admUser = create(AdmUser::class, ['password' => '123']);
		
		$this->assertEquals('123', $admUser->password);
	}
}

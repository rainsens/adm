<?php
namespace Rainsens\Adm\Tests;

use Rainsens\Adm\Facades\Adm;
use Rainsens\Adm\Models\AdmUser;
use Rainsens\Adm\Providers\AdmServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
	use TestTrait;
	
	public function setUp(): void
	{
		parent::setUp();
		
		$this->initTestEnvironment();
		
		$this->withFactories(_database_path('factories'));
	}
	
	protected function getPackageProviders($app)
	{
		return [
			AdmServiceProvider::class
		];
	}
	
	protected function getPackageAliases($app)
	{
		return [
			'Adm' => Adm::class,
		];
	}
	
	/**
	 * @param \Illuminate\Foundation\Application $app
	 */
	protected function getEnvironmentSetUp($app)
	{
	}
	
	protected function login($admUser = null)
	{
		$admUser = $admUser ?: create(AdmUser::class);
		$this->actingAs($admUser, 'adm');
		return $this;
	}
}

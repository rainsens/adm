<?php
namespace Rainsens\Adm\Tests;

use Rainsens\Adm\Facades\Adm;
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
		// Include migration.
		include_once __DIR__ . '/Dummy/Database/migrations/create_users_table.php.stub';
		
		// Create users_table.
		(new \CreateUsersTable)->up();
	}
}

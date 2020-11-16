<?php
namespace Rainsens\Adm\Tests;

use Illuminate\Support\Facades\File;
use Rainsens\Adm\Facades\Adm;
use Rainsens\Adm\Providers\AdmServiceProvider;
use Rainsens\Adm\Providers\RouteServiceProvider;

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
			AdmServiceProvider::class,
			RouteServiceProvider::class,
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
		// Include test migration.
		include_once __DIR__ . '/Dummy/Database/migrations/create_users_table.php.stub';
		
		// Create users_table.
		(new \CreateUsersTable)->up();
	}
}

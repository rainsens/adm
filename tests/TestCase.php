<?php
namespace Rainsens\Adm\Tests;

use Rainsens\Adm\Providers\AdmServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
	public function setUp(): void
	{
		parent::setUp();
		$this->withFactories(__DIR__ . '/../database/factories');
	}
	
	protected function getPackageProviders($app)
	{
		return [
			AdmServiceProvider::class
		];
	}
	
	protected function getEnvironmentSetUp($app)
	{
		// import the CreatePostsTable class from the migration
		/*include_once __DIR__ . '/../database/migrations/create_posts_table.php.stub';
		include_once __DIR__ . '/../database/migrations/create_users_table.php.stub';
		
		// run the up() method of that migration class
		(new \CreatePostsTable)->up();
		(new \CreateUsersTable)->up();*/
	}
}

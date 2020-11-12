<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
	use CommandTrait;
	
	protected $signature = 'adm:install';
	
	protected $description = 'Install the Adm package.';
	
	public function handle()
	{
		$this->makeNameSpace();
		$this->structureFileSystem();
		$this->initDatabase();
	}
	
	protected function structureFileSystem()
	{
		// Directories.
		$this->makeDirectory(adm_path());
		$this->makeDirectory(adm_path('Http/Controllers'));
		$this->makeDirectory(adm_path('routes'));
		$this->makeDirectory(public_path('vendor/adm/css'));
		
		// Files.
		$this->publishFile(config_path('adm.php'), 'config');
		$this->publishFile(adm_route_path('web.php'), 'route-web');
		$this->publishFile(adm_route_path('api.php'), 'route-api');
		$this->publishFile(adm_controller_path('HomeController.php'), 'home-controller');
		$this->publishFile(adm_controller_path('ExampleController.php'), 'example-controller');
	}
	
	protected function initDatabase()
	{
	
	}
}

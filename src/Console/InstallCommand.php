<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
	use CommandTrait;
	
	protected $signature = 'adm:install';
	
	protected $description = 'Install the Adm package.';
	
	public function handle()
	{
		$this->structureDirectories();
		
		$this->publishFile(config_path('adm.php'), 'config');
		$this->publishFile(adm_route_path('web.php'), 'route-web');
		$this->publishFile(adm_route_path('api.php'), 'route-api');
		$this->publishFile(adm_controller_path('HomeController.php'), 'home-controller');
		$this->publishFile(adm_controller_path('ExampleController.php'), 'example-controller');
		
		$this->initDatabase();
	}
	
	protected function structureDirectories()
	{
		if (File::isDirectory(adm_path())) {
			$this->error(adm_path().' directory already exists!');
			return;
		}
		File::makeDirectory(adm_path('Http/Controllers'), 0755, true, true);
		File::makeDirectory(adm_path('routes'), 0755, true, true);
	}
	
	protected function initDatabase()
	{
	
	}
}

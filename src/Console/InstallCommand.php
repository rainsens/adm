<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Rainsens\Adm\Exceptions\FileExistsException;

class InstallCommand extends Command
{
	protected $signature = 'adm:install';
	
	protected $description = 'Install the Adm package.';
	
	public function handle()
	{
		$this->publishConfigFile();
		$this->structureDirectories();
		$this->publishRouteFile();
		$this->initDatabase();
	}
	
	protected function publishConfigFile()
	{
		if (File::exists(config_path('adm.php'))) {
			throw new FileExistsException('The dependent config file adm.php already exists!');
		}
		
		$this->call('vendor:publish', [
			'--provider' => "Rainsens\Adm\Providers\AdmServiceProvider",
			'--tag' => "config"
		]);
	}
	
	protected function structureDirectories()
	{
		if (File::isDirectory(adm_path())) {
			$this->line("<error>'adm_path()' directory already exists!</error>");
			return;
		}
		// Create adm/Controllers folders at end user's project.
		File::makeDirectory(adm_path('Http/Controllers'), 0755, true, true);
		File::makeDirectory(adm_path('routes'), 0755, true, true);
	}
	
	protected function publishRouteFile()
	{
		if (File::exists(adm_path('routes/web.php'))) {
			throw new FileExistsException('The dependent route file routes/web.php already exists!');
		}
		$this->call('vendor:publish', [
			'--provider' => "Rainsens\Adm\Providers\AdmServiceProvider",
			'--tag' => "route"
		]);
	}
	
	protected function initDatabase()
	{
	
	}
}

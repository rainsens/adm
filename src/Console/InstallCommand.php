<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
	use CommandTrait;
	
	protected $signature = 'adm:install {--db}';
	
	protected $description = 'Install the Adm package.';
	
	public function handle()
	{
		$this->makeNameSpace();
		$this->structureFileSystem();
		$this->mixAssets();
		
		if ($this->option('db')) {
			// According to what end user types.
			$this->initDatabase();
		}
	}
	
	protected function structureFileSystem()
	{
		// Directories.
		$this->makeDirectory(adm_path());
		$this->makeDirectory(adm_path('Http/Controllers'));
		$this->makeDirectory(adm_path('routes'));
		
		// Files.
		$this->publishFile('config');
		$this->publishFile('route-web');
		$this->publishFile('route-api');
		$this->publishFile('home-controller');
		$this->publishFile('example-controller');
	}
	
	protected function mixAssets()
	{
		try {
			$symbolDir = readlink(base_path('vendor/rainsens/adm'));
			
			if ($symbolDir) {
				// On test environment.
				if (File::exists(public_path('vendor/adm/js/adm.js'))) {
					
					File::delete(public_path('vendor/adm/js/adm.js'));
					File::delete(public_path('vendor/adm/css/adm.css'));
					
					symlink(_public_path('js/adm.js'), public_path('vendor/adm/js/adm.js'));
					symlink(_public_path('css/adm.css'), public_path('vendor/adm/css/adm.css'));
					
				} else {
					$this->publishFile('asset-js');
					$this->publishFile('asset-css');
				}
			} else {
				// On production environment.
				$this->publishFile('asset-js');
				$this->publishFile('asset-css');
			}
		} catch (\Exception $e) {}
		
	}
	
	protected function initDatabase()
	{
		if ($this->confirm("Adm will run 'php artisan migrate', Do you agree this operation? [yes/no]")) {
			$this->call('migrate');
		}
		$this->info('The instalation aborted.');
		return;
	}
}

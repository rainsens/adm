<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Rainsens\Adm\Support\AdmSeeder;

class InstallCommand extends Command
{
	use CommandTrait;
	
	protected $signature = 'adm:install';
	
	protected $description = 'Install Adm package.';
	
	public function handle()
	{
		$this->check();
		
		$this->makeNameSpace();
		$this->structureFileSystem();
		$this->mixAssets();
		
		$this->initDatabase();
	}
	
	protected function check()
	{
		// Check wether published.
		if (!config('adm.name')) {
			$errorNote = "Please run: 'php artisan adm:config' first.\n";
			$this->error($errorNote);
			exit("ublish the config file and try it again.\n");
		}
	}
	
	protected function structureFileSystem()
	{
		// Directories.
		$this->makeDirectory(adm_path());
		$this->makeDirectory(adm_path('Http/Controllers'));
		$this->makeDirectory(adm_path('routes'));
		
		// Files.
		$this->publishFile('route-web');
		$this->publishFile('route-api');
		$this->publishFile('home-controller');
		$this->publishFile('example-controller');
		
	}
	
	protected function mixAssets()
	{
		try {
			// Wether or not a test composer package.
			$symbolDir = readlink(base_path('vendor/rainsens/adm'));
			
			if ($symbolDir) {
				// On test environment.
				if (File::exists(adm_public_path('js/adm.js'))) {
					
					File::delete(adm_public_path('js/adm.js'));
					File::delete(adm_public_path('css/adm.css'));
					File::deleteDirectory(adm_public_path('skin'));
					
					$this->publishFile('asset-skin');
					symlink(_public_path('js/adm.js'), adm_public_path('js/adm.js'));
					symlink(_public_path('css/adm.css'), adm_public_path('css/adm.css'));
					
				} else {
					$this->publishFile('asset-skin');
					$this->publishFile('asset-js');
					$this->publishFile('asset-css');
				}
			} else {
				// On production environment.
				$this->publishFile('asset-skin');
				$this->publishFile('asset-js');
				$this->publishFile('asset-css');
			}
		} catch (\Exception $e) {}
	}
	
	protected function initDatabase()
	{
		$this->call('migrate');
		$this->call('db:seed', ['--class' => AdmSeeder::class]);
	}
}

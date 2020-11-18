<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishCommand extends Command
{
	use CommandTrait;
	
	protected $signature = 'adm:publish';
	
	protected $description = 'Publish Adm package.';
	
	public function handle()
	{
		$this->makeNameSpace();
		$this->structureFileSystem();
		$this->mixAssets();
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
			// Wether or not a test composer package.
			$symbolDir = readlink(base_path('vendor/rainsens/adm'));
			
			if ($symbolDir) {
				// On test environment.
				if (File::exists(public_path('vendor/adm/js/adm.js'))) {
					
					File::delete(public_path('vendor/adm/js/adm.js'));
					File::delete(public_path('vendor/adm/css/adm.css'));
					File::deleteDirectory(public_path('vendor/adm/skin'));
					
					$this->publishFile('asset-skin');
					symlink(_public_path('js/adm.js'), public_path('vendor/adm/js/adm.js'));
					symlink(_public_path('css/adm.css'), public_path('vendor/adm/css/adm.css'));
					
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
}

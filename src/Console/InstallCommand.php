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
		$this->makeDirectory(public_path('vendor/adm/css/fonts'));
		
		// Files.
		$this->publishFile('config');
		$this->publishFile('route-web');
		$this->publishFile('route-api');
		$this->publishFile('home-controller');
		$this->publishFile('example-controller');
		$this->publishFile('asset-css');
		$this->publishFile('asset-js');
	}
	
	protected function initDatabase()
	{
	
	}
}

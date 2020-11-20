<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Rainsens\Adm\Support\AdmSeeder;

class InstallCommand extends Command
{
	protected $signature = 'adm:install';
	
	protected $description = 'Install Adm package.';
	
	public function handle()
	{
		$this->check();
		
		$this->initDatabase();
	}
	
	protected function check()
	{
		// Check wether published.
		if (! File::exists(adm_route_path('web.php'))) {
			$errorNote = "Please run: 'php artisan adm:publish' first.\n";
			$this->error($errorNote);
			exit($errorNote);
		}
	}
	
	protected function initDatabase()
	{
		if ($this->confirm("Adm will run 'php artisan migrate' and 'php artisan db:seed', Do you agree this operation? [yes/no]")) {
			$this->call('migrate');
			$this->call('db:seed', ['--class' => AdmSeeder::class]);
			
		} else {
			$this->info('The installation aborted.');
		}
	}
}

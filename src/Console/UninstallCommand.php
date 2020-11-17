<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Rainsens\Adm\Contracts\ComposerContract;

class UninstallCommand extends Command
{
	protected $signature = 'adm:uninstall';
	
	protected $description = 'Uninstall Adm package.';
	
	public function handle()
	{
		$this->removeAdmDirectory();
		$this->removeConfigFile();
		$this->removeNamespace();
	}
	
	private function removeNamespace()
	{
		$composer = app(ComposerContract::class);
		
		$path = base_path('composer.json');
		$composer->removePsrFourItem($path, 'Adm\\');
	}
	
	private function removeConfigFile()
	{
		if (File::exists(config_path('adm.php'))) {
			File::delete(config_path('adm.php'));
		}
	}
	
	private function removeAdmDirectory()
	{
		if (File::isDirectory(adm_path())) {
			File::deleteDirectory(adm_path());
			File::deleteDirectory(public_path('vendor/adm'));
		}
	}
}

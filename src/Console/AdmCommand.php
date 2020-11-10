<?php
namespace Rainsens\Adm\Console;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Rainsens\Adm\Facades\Adm;

class AdmCommand extends Command
{
	protected $signature = 'adm';
	
	protected $description = 'List all commands of Adm';
	
	protected $logo = <<<LOGO
========== ADM-APPADMINISTRATION ==========
LOGO;

	
	public function handle()
	{
		$this->info($this->logo);
		$this->info(Adm::version());
		$this->info('');
		$this->comment('Available commands:');
		
		$this->admCommands();
	}
	
	protected function admCommands()
	{
		$commands = collect(Artisan::all())->mapWithKeys(function ($command, $key) {
			if (Str::startsWith($key, 'adm:')) {
				return [$key => $command];
			}
			return [];
		})->toArray();
		
		foreach ($commands as $command) {
			$this->info(sprintf("%s", $command->getName(), $command->getDescription()));
		}
	}
}

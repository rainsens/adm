<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;
use Rainsens\Adm\Facades\Adm;
use Rainsens\Adm\Support\Command as Console;

class AdmCommand extends Command
{
	protected $signature = 'adm';
	
	protected $description = 'List all commands of Adm';
	
	protected $logo = <<<LOGO
	
=== ADM-APPADMINISTRATION

LOGO;
	
	public function handle(Console $console)
	{
		$this->info($this->logo);
		$this->info('--- ' . Adm::version());
		$this->info('');
		$this->comment('Available commands:');
		
		foreach ($console->getCommands() as $command) {
			$this->info($command);
		}
	}
}

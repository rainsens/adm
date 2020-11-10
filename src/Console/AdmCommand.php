<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;

class AdmCommand extends Command
{
	protected $signature = 'adm';
	
	protected $description = 'List all commands of Adm';
	
	public function handle()
	{
		$this->info('Installing Adm...');
		$this->info('Publishing configuration...');
		
		
		
		$this->info('Installed Adm');
	}
}

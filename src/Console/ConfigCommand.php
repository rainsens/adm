<?php
namespace Rainsens\Adm\Console;

use Illuminate\Console\Command;

class ConfigCommand extends Command
{
	use CommandTrait;
	
	protected $signature = 'adm:config';
	
	protected $description = 'Publish config file.';
	
	public function handle()
	{
		$this->publishFile('config');
	}
}

<?php
namespace Rainsens\Adm\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Rainsens\Adm\Contracts\CommandInterface;

class Command implements CommandInterface
{
	public function getCommands(): array
	{
		$admCommands = [];
		
		$commands = collect(Artisan::all())->mapWithKeys(function ($command, $key) {
			if (Str::startsWith($key, 'adm:')) {
				return [$key => $command];
			}
			return [];
		})->toArray();
		
		foreach ($commands as $command) {
			$admCommands[] = sprintf("%s %s", $command->getName(), $command->getDescription());
		}
		
		return $admCommands;
	}
}

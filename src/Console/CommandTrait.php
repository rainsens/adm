<?php
namespace Rainsens\Adm\Console;

use Illuminate\Support\Facades\File;
use Rainsens\Adm\Contracts\ComposerContract;
use Rainsens\Adm\Exceptions\AdmConsoleException;
use Rainsens\Adm\Exceptions\FileNotFoundException;
use Rainsens\Adm\Exceptions\InvalidArgumentException;

trait CommandTrait
{
	protected function makeNameSpace()
	{
		try {
			$path = base_path('composer.json');
			$key = config('adm.namespace.name', 'Adm').'\\';
			$value = trim(config('adm.namespace.value', 'adm/'), '/').'/';
			app(ComposerContract::class)->setPsrFourItem($path, $key, $value);
			
		} catch (AdmConsoleException $e) {
			if ($e instanceof InvalidArgumentException) {
				$this->error($e->getMessage());
				/*if ($this->confirm('Would you like to overwrite it? Please handle it carefully!')) {
					$this->call('adm:install -f');
				}*/
			} elseif ($e instanceof FileNotFoundException) {
				$this->error($e->getMessage());
			}
		}
	}
	
	protected function makeDirectory($targetPath)
	{
		if (File::isDirectory($targetPath)) {
			$this->error($targetPath." directory '$targetPath' already exists!");
			return;
		}
		File::makeDirectory($targetPath, 0755, true, true);
	}
	
	protected function publishFile($tag)
	{
		$this->call('vendor:publish', [
			'--provider' => "Rainsens\Adm\Providers\AdmServiceProvider",
			'--tag' => $tag
		]);
	}
}

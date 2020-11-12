<?php
namespace Rainsens\Adm\Console;

use Illuminate\Support\Facades\File;
use Rainsens\Adm\Contracts\ComposerInterface;
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
			app(ComposerInterface::class)->setPsrFourItem($path, $key, $value);
			
		} catch (AdmConsoleException $e) {
			if ($e instanceof InvalidArgumentException) {
				$this->error($e->getMessage());
				/*if ($this->confirm('Would you like to overwrite it? Please handle it carefully!')) {
					$this->call('adm:reinstall');
				}*/
			} elseif ($e instanceof FileNotFoundException) {
				$this->error($e->getMessage());
			}
		}
	}
	
	protected function publishFile($targetPath, $tag)
	{
		if (File::exists($targetPath)) {
			$this->error('The dependent file already exists!');
		}
		
		$this->call('vendor:publish', [
			'--provider' => "Rainsens\Adm\Providers\AdmServiceProvider",
			'--tag' => $tag
		]);
	}
}

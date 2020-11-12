<?php
namespace Rainsens\Adm\Support;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Rainsens\Adm\Contracts\ComposerInterface;
use Rainsens\Adm\Exceptions\FileNotFoundException;
use Rainsens\Adm\Exceptions\InvalidArgumentException;

class Composer implements ComposerInterface
{
	public function setPsrFourItem($path, $key, $value): void
	{
		if ($this->hasPsrFourItem($path, $key)) {
			throw new InvalidArgumentException("The item '$key' in Psr-4 already exists!");
		}
		
		$this->appendPsrItem($path, $key, $value);
	}
	
	public function hasPsrFourItem($path, $key): bool
	{
		$jsonArray = $this->getJsonToArray($path);
		$realPsrKey = $this->getRealPsrKey($key);
		
		if (Arr::has($jsonArray, $realPsrKey)) {
			return true;
		}
		return false;
	}
	
	public function removePsrFourItem($path, $key): void
	{
		$jsonArray = $this->getJsonToArray($path);
		$realKey = $this->getRealPsrKey($key);
		
		Arr::forget($jsonArray, $realKey);
		
		$this->putToFile($path, $jsonArray);
	}
	
	private function getJsonToArray($path)
	{
		if (! $file = File::get($path)) {
			throw new FileNotFoundException('The path given does not exist!');
		}
		
		return json_decode($file, true);
	}
	
	private function getRealPsrKey($key)
	{
		return 'autoload.psr-4.' . $key;
	}
	
	private function appendPsrItem($path, $key, $value)
	{
		$jsonArray = $this->getJsonToArray($path);
		$realKey = $this->getRealPsrKey($key);
		
		Arr::set($jsonArray, $realKey, $value);
		
		$this->putToFile($path, $jsonArray);
	}
	
	private function putToFile($path, array $json)
	{
		$json = str_replace("\\/", '/', json_encode($json, JSON_PRETTY_PRINT));
		File::put($path, $json);
	}
}

<?php

namespace Rainsens\Adm\Providers;

use Rainsens\Adm\Adm;
use Illuminate\Support\ServiceProvider;
use Rainsens\Adm\Console\AdmCommand;

class AdmServiceProvider extends ServiceProvider
{
	protected $commands = [
		AdmCommand::class,
	];
	
	public function register()
	{
		$this->binds();
	}
	
	public function boot()
	{
		if ($this->app->runningInConsole()) {
			
			$this->commands($this->commands);
			$this->publishments();
			$this->migrations();
		}
		
		$this->routes();
	}
	
	protected function binds()
	{
		$this->app->bind('adm', function ($app) {
			return new Adm();
		});
	}
	
	protected function publishments()
	{
		$this->publishes([__DIR__ . '/../../config/adm.php' => config_path('adm.php')], 'config');
	}
	
	protected function routes()
	{
		if (file_exists($routes = adm_path('routes.php'))) {
			$this->loadRoutesFrom($routes);
		} else {
			$this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
		}
	}
	
	protected function migrations()
	{
		$this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
	}
}

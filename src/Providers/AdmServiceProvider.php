<?php

namespace Rainsens\Adm\Providers;

use Rainsens\Adm\Adm;
use Illuminate\Support\ServiceProvider;
use Rainsens\Adm\Console\AdmCommand;
use Rainsens\Adm\Console\InstallCommand;
use Rainsens\Adm\Exceptions\FileNotFoundException;

class AdmServiceProvider extends ServiceProvider
{
	protected $commands = [
		AdmCommand::class,
		InstallCommand::class,
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
		$this->publishes([adm_base_path('config/adm.php') => config_path('adm.php')], 'config');
		$this->publishes([adm_base_path('routes/webroutes.php') => adm_path('webroutes.php')], 'route');
	}
	
	protected function routes()
	{
		if (file_exists($routes = adm_path('admweb.php'))) {
			$this->loadRoutesFrom($routes);
		}
	}
	
	protected function migrations()
	{
		$this->loadMigrationsFrom(adm_base_path('database/migrations'));
	}
}

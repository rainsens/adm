<?php

namespace Rainsens\Adm\Providers;

use Rainsens\Adm\Adm;
use Illuminate\Support\ServiceProvider;
use Rainsens\Adm\Console\AdmCommand;
use Rainsens\Adm\Console\InstallCommand;

class AdmServiceProvider extends ServiceProvider
{
	protected $commands = [
		AdmCommand::class,
		InstallCommand::class,
	];
	
	public function register()
	{
		$this->app->bind('adm', function ($app) {
			return new Adm();
		});
		
		$this->app->alias(Adm::class, 'adm');
	}
	
	public function boot()
	{
		if ($this->app->runningInConsole()) {
			
			$this->commands($this->commands);
			$this->publishments();
			$this->migrations();
		}
		
		$this->views();
		$this->routes();
	}
	
	protected function publishments()
	{
		$this->publishes([
			_config_path('adm.php') => config_path('adm.php')
		], 'config');
		
		$this->publishes([
			_stub_path('routes/web.php.stub') => adm_route_path('web.php')
		], 'route');
		
		$this->publishes([
			_stub_path('controllers/HomeController.php.stub') => adm_controller_path('HomeController.php')
		], 'home-controller');
		
		$this->publishes([
			_stub_path('controllers/ExampleController.php.stub') => adm_controller_path('ExampleController.php')
		], 'example-controller');
	}
	
	protected function views()
	{
		$this->loadViewsFrom(_resource_path('views'), 'adm');
	}
	
	protected function routes()
	{
		if (file_exists($routes = adm_route_path('web.php'))) {
			$this->loadRoutesFrom($routes);
		}
	}
	
	protected function migrations()
	{
		$this->loadMigrationsFrom(_database_path('migrations'));
	}
}

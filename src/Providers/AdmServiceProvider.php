<?php

namespace Rainsens\Adm\Providers;

use Rainsens\Adm\Adm;
use Rainsens\Adm\Console\AdmCommand;
use Illuminate\Support\ServiceProvider;
use Rainsens\Adm\Console\InstallCommand;

class AdmServiceProvider extends ServiceProvider
{
	protected $commands = [
		AdmCommand::class,
		InstallCommand::class,
	];
	
	public function register()
	{
		$this->app->bind('adm', function ($app) {return new Adm();});
		$this->app->register(RouteServiceProvider::class);
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
	
	public function provides()
	{
		return parent::provides();
	}
	
	protected function publishments()
	{
		$this->publishes([
			_config_path('adm.php') => config_path('adm.php')
		], 'config');
		
		$this->publishes([
			_stub_path('routes/web.stub') => adm_route_path('web.php')
		], 'route-web');
		
		$this->publishes([
			_stub_path('routes/api.stub') => adm_route_path('api.php')
		], 'route-api');
		
		$this->publishes([
			_stub_path('controllers/HomeController.stub') => adm_controller_path('HomeController.php')
		], 'home-controller');
		
		$this->publishes([
			_stub_path('controllers/ExampleController.stub') => adm_controller_path('ExampleController.php')
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

<?php

namespace Rainsens\Adm\Providers;

use Rainsens\Adm\Adm;
use Rainsens\Adm\Console\UninstallCommand;
use Rainsens\Adm\Support\Composer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Rainsens\Adm\Console\AdmCommand;
use Illuminate\Support\ServiceProvider;
use Rainsens\Adm\Console\PublishCommand;
use Rainsens\Adm\Console\InstallCommand;
use Rainsens\Adm\Contracts\ComposerContract;
use Rainsens\Adm\Http\Middleware\Authenticate;

class AdmServiceProvider extends ServiceProvider
{
	protected $commands = [
		AdmCommand::class,
		PublishCommand::class,
		InstallCommand::class,
		UninstallCommand::class,
	];
	
	public function register()
	{
		$this->app->bind('adm', function () {return new Adm();});
		$this->app->bind(ComposerContract::class, Composer::class);
		$this->app->register(RouteServiceProvider::class);
	}
	
	public function boot()
	{
		$this->app->setLocale(config('app.locale') ?? 'zh-CN');
		
		if ($this->app->runningInConsole()) {
			$this->commands($this->commands);
		}
		
		$this->migrations();
		
		$this->translations();
		$this->routes();
		$this->middleware();
		$this->publishments();
		
		$this->views();
		$this->composerShare();
	}
	
	protected function migrations()
	{
		$this->loadMigrationsFrom(_database_path('migrations'));
	}
	
	protected function translations()
	{
		$this->loadTranslationsFrom(_resource_path('lang'), 'adm');
	}
	
	protected function routes()
	{
		if (file_exists(adm_route_path('web.php'))) {
			$this->loadRoutesFrom(adm_route_path('web.php'));
		} else {
			$this->loadRoutesFrom(_stub_path('routes/web.stub'));
		}
	}
	
	protected function middleware()
	{
		app('router')->aliasMiddleware('adm.auth', Authenticate::class);
	}
	
	protected function publishments()
	{
		$this->publishes([_config_path('adm.php') => config_path('adm.php')], 'config');
		
		$this->publishes([_stub_path('routes/web.stub') => adm_route_path('web.php')], 'route-web');
		$this->publishes([_stub_path('routes/api.stub') => adm_route_path('api.php')], 'route-api');
		$this->publishes([_stub_path('controllers/HomeController.stub') => adm_controller_path('HomeController.php')], 'home-controller');
		$this->publishes([_stub_path('controllers/ExampleController.stub') => adm_controller_path('ExampleController.php')], 'example-controller');
		$this->publishes([_stub_path('controllers/ExampleController.stub') => adm_controller_path('ExampleController.php')], 'example-controller');
		
		$this->publishes([_public_path('js') => public_path('vendor/adm/js')], 'asset-js');
		$this->publishes([_public_path('css') => public_path('vendor/adm/css')], 'asset-css');
	}
	
	protected function views()
	{
		$this->loadViewsFrom(_resource_path('views'), 'adm');
	}
	
	protected function composerShare()
	{
		View::composer('*', function (\Illuminate\View\View $view) {
			switch (Route::currentRouteName()) {
				case 'adm.login':
					$bodyClass = 'hold-transition login-page';
					$bodyStyle = '';
					break;
				case 'adm.home':
					$bodyClass = 'sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed';
					$bodyStyle = '';
					break;
				default:
					$bodyClass = '';
					$bodyStyle = '';
			}
			
			$view->with('admBodyAttributes', [
				'class' => $bodyClass,
				'style' => $bodyStyle,
			]);
			
		});
	}
}

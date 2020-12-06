<?php

namespace Rainsens\Adm\Providers;

use Rainsens\Adm\Adm;
use Rainsens\Adm\Models\Menu;
use Rainsens\Adm\Grid\AdmGrid;
use Rainsens\Adm\Support\AdmAuth;
use Rainsens\Adm\Support\Composer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Rainsens\Adm\Console\AdmCommand;
use Illuminate\Support\ServiceProvider;
use Rainsens\Adm\Console\ConfigCommand;
use Rainsens\Adm\Console\InstallCommand;
use Rainsens\Adm\Console\UninstallCommand;
use Rainsens\Adm\Contracts\ComposerContract;
use Rainsens\Adm\Http\Middleware\Authenticate;
use Rainsens\Rbac\Providers\RbacServiceProvider;
use Rainsens\Adm\Exceptions\AdmExceptionHandler;
use Illuminate\Contracts\Debug\ExceptionHandler;

class AdmServiceProvider extends ServiceProvider
{
	protected $commands = [
		AdmCommand::class,
		ConfigCommand::class,
		InstallCommand::class,
		UninstallCommand::class,
	];
	
	protected $routeMiddlewares = [
		'adm.auth' => Authenticate::class,
	];
	
	protected $middlewareGroups = [
		'adm' => [
			'adm.auth',
		],
	];
	
	public function register()
	{
		$this->app->singleton(ExceptionHandler::class, AdmExceptionHandler::class);
		$this->app->register(RbacServiceProvider::class);
		$this->app->register(RouteServiceProvider::class);
		
		$this->app->bind('adm', function () {return new Adm;});
		$this->app->bind('adm-auth', function () {return new AdmAuth;});
		$this->app->bind('adm-grid', function () {return new AdmGrid;});
		
		$this->app->bind(ComposerContract::class, Composer::class);
		
		$this->app->singleton('Rainsens\Adm\Contracts\Grid\Grid', 'Rainsens\Adm\Grid\AdmGrid');
		$this->app->bind('Rainsens\Adm\Contracts\Grid\Basic', 'Rainsens\Adm\Grid\GridBasic');
		$this->app->bind('Rainsens\Adm\Contracts\Grid\Column', 'Rainsens\Adm\Grid\GridColumn');
		$this->app->bind('Rainsens\Adm\Contracts\Grid\Filter', 'Rainsens\Adm\Grid\GridFilter');
		$this->app->bind('Rainsens\Adm\Contracts\Grid\Tool', 'Rainsens\Adm\Grid\GridTool');
		$this->app->bind('Rainsens\Adm\Contracts\Grid\Render', 'Rainsens\Adm\Grid\GridRender');
	}
	
	public function boot()
	{
		$this->app->setLocale(config('app.locale') ?? 'zh-CN');
		$this->admTranslations();
		
		$this->admMigrations();
		
		$this->admRoutes();
		$this->admMiddleware();
		$this->admPublishs();
		$this->admViews();
		$this->admComposerShare();
		
		$this->admGuard();
		$this->commands($this->commands);
	}
	
	protected function admMigrations()
	{
		$this->loadMigrationsFrom(_database_path('migrations'));
	}
	
	protected function admTranslations()
	{
		$this->loadTranslationsFrom(_resource_path('lang'), 'adm');
	}
	
	protected function admRoutes()
	{
		if (file_exists(adm_route_path('web.php'))) {
			$this->loadRoutesFrom(adm_route_path('web.php'));
		} else {
			$this->loadRoutesFrom(_stub_path('routes/web.php'));
		}
	}
	
	protected function admMiddleware()
	{
		foreach ($this->routeMiddlewares as $key => $middleware) {
			app('router')->aliasMiddleware($key, $middleware);
		}
		
		foreach ($this->middlewareGroups as $key => $middleware) {
			app('router')->middlewareGroup($key, $middleware);
		}
	}
	
	protected function admPublishs()
	{
		$this->publishes([_config_path('adm.php') => config_path('adm.php')], 'config');
		
		$this->publishes([_stub_path('routes/web.php') => adm_route_path('web.php')], 'route-web');
		$this->publishes([_stub_path('routes/api.php') => adm_route_path('api.php')], 'route-api');
		$this->publishes([_stub_path('controllers/HomeController.php') => adm_controller_path('HomeController.php')], 'home-controller');
		$this->publishes([_stub_path('controllers/ExampleController.php') => adm_controller_path('ExampleController.php')], 'example-controller');
		$this->publishes([_stub_path('controllers/ExampleController.php') => adm_controller_path('ExampleController.php')], 'example-controller');
		
		$this->publishes([_public_path('skin') => adm_public_path('skin')], 'asset-skin');
		$this->publishes([_public_path('js') => adm_public_path('js')], 'asset-js');
		$this->publishes([_public_path('css') => adm_public_path('css')], 'asset-css');
	}
	
	protected function admViews()
	{
		$this->loadViewsFrom(_resource_path('views'), 'adm');
	}
	
	protected function admComposerShare()
	{
		View::composer('*', function (\Illuminate\View\View $view) {
			switch (Route::currentRouteName()) {
				case 'adm.login':
					$bodyClass = 'external-page sb-l-c sb-r-c';
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
			
			$view->with('share', [
				'menus' => Menu::all(),
				'attributes' => [
					'body.class' => $bodyClass,
					'body.style' => $bodyStyle,
				]
			]);
			
		});
	}
	
	protected function admGuard()
	{
		config(["auth.guards.adm" => config('adm.auth.guards.adm')]);
		config(['auth.providers.adm' => config('adm.auth.providers.adm')]);
		config(['auth.passwords.adm' => config('adm.auth.passwords.adm')]);
	}
}

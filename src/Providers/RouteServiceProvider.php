<?php

namespace Rainsens\Adm\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }
    
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }
    
    protected function mapWebRoutes()
    {
    	$routes = $this->app->environment('testing')
		    ? _stub_path('routes/web.php')
		    : adm_route_path('web.php');
    	
	    Route::prefix(config('adm.route.prefix'))
		    ->middleware(config('adm.route.middleware'))
		    ->namespace(config('adm.route.namespace'))
		    ->name(config('adm.route.prefix').'.')
		    ->group($routes);
    }
    
    protected function mapApiRoutes()
    {
	    /*if (File::exists(adm_route_path('api.php'))) {
	    	
		    Route::prefix('api')
			    ->middleware('api')
			    ->namespace('Adm\\Http\\Controllers')
			    ->name('adm.')
			    ->group(adm_route_path('api.php'));
	    }*/
    }
}

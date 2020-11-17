<?php

namespace Rainsens\Adm\Providers;

use Illuminate\Support\Facades\File;
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
    	if (File::exists(adm_route_path('web.php'))) {
		    Route::prefix('adm')
			    ->middleware('web')
			    ->namespace('Adm\\Http\\Controllers')
			    ->name('adm.')
			    ->group(adm_route_path('web.php'));
	    }
    }
    
    protected function mapApiRoutes()
    {
	    if (File::exists(adm_route_path('api.php'))) {
	    	
		    Route::prefix('api')
			    ->middleware('api')
			    ->namespace('Adm\\Http\\Controllers')
			    ->name('adm.')
			    ->group(adm_route_path('api.php'));
	    }
    }
}

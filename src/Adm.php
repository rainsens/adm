<?php
namespace Rainsens\Adm;

use Illuminate\Support\Facades\Route;
use Rainsens\Adm\Http\Controllers\AuthController;
use Rainsens\Adm\Http\Controllers\MenusController;

class Adm
{
	const VERSION = '1.0.0';
	
	public function version()
	{
		return sprintf('ADM <comment>version</comment> <info>%s</info>', self::VERSION);
	}
	
	public function routes()
	{
		app('router')->group([
			'prefix' => config('adm.route.prefix'),
			'namespace' => 'Rainsens\Adm\Http\Controllers',
			'middleware' => config('adm.route.middleware'),
		], function () {
			
			Route::resource('menus', MenusController::class);
			
			Route::get('login', [AuthController::class, 'login'])->name('adm.login');
			Route::post('login', [AuthController::class, 'login'])->name('adm.login.store');
			Route::post('logout', [AuthController::class, 'logout'])->name('adm.logout');
			
		});
	}

}

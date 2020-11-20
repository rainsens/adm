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
		Route::prefix('adm')->middleware('web')->name('adm.')
			->group(function () {
				
				Route::group([], function () {
					
					Route::resources([
						'menus' => MenusController::class,
					]);
					
					Route::post('menus/order', [MenusController::class, 'order'])->name('menus.order');
				});
				
				Route::get('login', [AuthController::class, 'login'])->name('login');
				Route::post('login', [AuthController::class, 'store'])->name('login.store');
				Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
			});
	}

}

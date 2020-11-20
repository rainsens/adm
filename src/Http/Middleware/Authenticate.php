<?php
namespace Rainsens\Adm\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
	public function handle($request, Closure $next)
	{
		if (Auth::guard('adm')->guest()) {
			return redirect(route('adm.login'));
		}
		
		return $next($request);
	}
}

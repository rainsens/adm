<?php
namespace Rainsens\Adm\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Rainsens\Adm\Facades\AdmAuth;

class Authenticate
{
	public function handle(Request $request, Closure $next)
	{
		if (AdmAuth::guest()) {
			return redirect(route('adm.login'));
		}
		
		return $next($request);
	}
}

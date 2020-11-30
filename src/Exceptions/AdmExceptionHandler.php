<?php
namespace Rainsens\Adm\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Support\Facades\Auth;

class AdmExceptionHandler extends Handler
{
	/**
	 * A list of the exception types that are not reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		//
	];
	
	/**
	 * A list of the inputs that are never flashed for validation exceptions.
	 *
	 * @var array
	 */
	protected $dontFlash = [
		'password',
		'password_confirmation',
	];
	
	/**
	 * Report or log an exception.
	 *
	 * @param  \Exception  $exception
	 * @return void
	 *
	 * @throws \Exception
	 */
	public function report(Exception $exception)
	{
		parent::report($exception);
	}
	
	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $exception
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 * @throws \Exception
	 */
	public function render($request, Exception $exception)
	{
		if ($exception instanceof \Rainsens\Rbac\Exceptions\UnauthorizedException) {
			return redirect(route('adm.login'));
		} else {
			return parent::render($request, $exception);
		}
	}
}

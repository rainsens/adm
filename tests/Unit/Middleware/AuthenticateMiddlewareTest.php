<?php
namespace Rainsens\Adm\Tests\Unit\Middleware;

use Illuminate\Http\Request;
use Rainsens\Adm\Http\Middleware\Authenticate;
use Rainsens\Adm\Tests\TestCase;

class AuthenticateMiddlewareTest extends TestCase
{
	/** @test */
	public function redirect_to_login_page_if_not_authenticated()
	{
		$request = new Request();
		
		$authenticateMiddleware = new Authenticate();
		
		$response = $authenticateMiddleware->handle($request, function () {});
		
		$this->assertEquals(route('adm.login'), $response->getTargetUrl());
	}
}

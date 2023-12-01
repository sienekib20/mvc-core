<?php

namespace Gbs\Kibo;

use Gbs\Kibo\Router\Anotation\Route;
use Gbs\Kibo\Http\Request;
use Gbs\Kibo\Http\Response;
use Gbs\Kibo\Exceptions\Rendering\Whoops;

class Application
{
	protected Request $request;
	protected Response $response;
	protected Route $route;
	private $whoops = null;

	public function __construct()
	{
		$this->request = new Request();
		$this->response = new Response();
		$this->route = new Route($this->request, $this->response);
		$this->whoops = Whoops::lookUp();
	}

	public function init()
	{
		try {
			$this->route->resolve();
		} catch (\Exception $e) {
			$this->whoops->handleException($e);
		}
	}

}
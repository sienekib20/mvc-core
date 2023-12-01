<?php

namespace Gbs\Kibo\Http;

class Request
{
	private ?string $prefix = null;
	private array $body = [];

	public function __construct()
	{
		$this->prefix = env('APP_NAME', basename(abs_path()));
		$this->setBody();
	}


	public function bind(array $params)
	{
		foreach ($params as $key => &$value) {
			$_REQUEST[$key] = $value;
		}
	}

	private function setBody()
	{
		foreach ($_REQUEST as $key => $value) {
			$this->body[$key] = strip_tags($value);
		}
		return $this->body;
	}

	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	public function uri()	
	{
		$path = $_SERVER['REQUEST_URI'] ?? '/';
		$position = strpos($path, '?');

		if ($position != false) {
			$path = substr($path, 0, $position);
		}

		$path = explode($this->prefix, $path);

		return end($path);
	}

	public function path()
	{
		return $this->uri();
	}
}
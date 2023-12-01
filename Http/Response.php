<?php

namespace Gbs\Kibo\Http;

class Response
{
	protected int $statusCode = 200;
	protected array $headers = [];

	public function __construct(
		mixed $body = '', 
		int $statusCode = 200, 
		array $headers = []
	) {

	}

	public function setHttpCode(int $code)
	{
		http_response_code($code);
	}

	public function json(array $data)
	{
		
	}
}
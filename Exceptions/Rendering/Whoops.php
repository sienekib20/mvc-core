<?php

namespace Gbs\Kibo\Exceptions\Rendering;

class Whoops
{
	public static function lookUp()
	{
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();
		return $whoops;
	}

}
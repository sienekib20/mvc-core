<?php

namespace Gbs\Kibo\Router\Regex;

class RegexChecker
{
	public static function findWildcard($route) : int
	{
		$pattern = "/.*\/\(.+\)$/";

		return preg_match($pattern, $route);
	}
}
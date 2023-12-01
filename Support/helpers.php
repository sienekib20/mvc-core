<?php

use Gbs\Kibo\Application;
use Gbs\Kibo\Templates\View;

if (! function_exists('abs_path')) {
	function abs_path()
	{
		return dirname(__DIR__, 2);
	}
}

if (! function_exists('app')) {
	function app()
	{
		static $instance = null;
		if (is_null($instance)) {
			$instance = new Application();
		}
		return $instance;
	}
}

if (! function_exists('env')) {
	function env($key, $default = null)
	{
		return $_ENV[$key] ?? $default;
	}
}

if (! function_exists('view_path')) {
	function view_path()
	{
		return abs_path() . '/resources/views';
	}
}

if (! function_exists('view')) {
	function view()
	{
		return (new View(view_path() . '/'));
	}
}
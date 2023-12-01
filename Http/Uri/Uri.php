<?php

namespace Skelys\Kibo\Http\Uri;

trait Uri
{
	public function resolve($serverUri) 
	{
		$path = $serverUri ?? '/';
		if (($position = strpos($path, '?'))) {
			$path = explode('?', $path, 2)[0];
		}
		$path = explode(
			env('APP_NAME'), $path
		);
		return end($path);
	}
}
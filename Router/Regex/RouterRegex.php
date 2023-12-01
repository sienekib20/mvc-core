<?php

namespace Gbs\Kibo\Router\Regex;

Enum RouterRegex : string
{
	case any = '([a-zA-Z0-9\_-]+)';
	case alpha = '([a-zA-Z]+)';
	case numeric = '([0-9]+)';
}
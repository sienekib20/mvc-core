<?php

namespace Gbs\Kibo\Console\Commands;

abstract class Command
{
	abstract public function run($argc, $argv);
}
<?php

use Illuminate\Container\Container;
use Like\Database\Config as DatabaseConfig;
use Like\Database\Eloquent;
use Like\Eloquent\IdeHelper\Config;
use Like\Eloquent\IdeHelper\Tests\Config as TestsConfig;

Container::getInstance()->instance(
	DatabaseConfig::class,
	new TestsConfig()
);
Eloquent::init();

return new Config([
	'ide-helper.model_locations' => [
		'Models/',
	],
]);

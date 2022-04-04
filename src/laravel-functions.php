<?php

use Illuminate\Container\Container;

function base_path() {
	return Container::getInstance()->resolved('base-path') ?: getcwd();
}

function config() {
	return Container::getInstance()->resolved('config');
}

<?php

namespace Like\Eloquent\IdeHelper\Tests;

use Like\Database\Config as DatabaseConfig;

class Config implements DatabaseConfig {
	const DRIVER = 'mysql';
	const HOST = 'mysql';
	const USER = 'root';
	const PASSWORD = 'root';
	const DB = 'eloquent';
	const FACTORY_FOLDER = __DIR__ . '/./Factories/';
	const FAKER_LANGUAGE = 'pt_BR';

	public function getDriver() {
		return self::DRIVER;
	}

	public function getHost() {
		return self::HOST;
	}

	public function getDb() {
		return self::DB;
	}

	public function getUser() {
		return self::USER;
	}

	public function getPassword() {
		return self::PASSWORD;
	}

	public function getFactoryFolder() {
		return self::FACTORY_FOLDER;
	}

	public function getFakerLanguage() {
		return self::FAKER_LANGUAGE;
	}

	public function getFakerProviders() {
		return [];
	}
}

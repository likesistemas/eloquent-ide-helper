<?php

namespace Like\Eloquent\IdeHelper;

use ArrayAccess;
use Illuminate\Support\Arr;
use RuntimeException;

class Config implements ArrayAccess {
	/**
	 * @var array
	 */
	private $config = [];

	public function __construct(array $config) {
		$this->config = $config;
	}

	public function get($key, $defaultVaue = null) {
		return Arr::get($this->config, $key, $defaultVaue);
	}

	public function offsetExists($offset): bool {
		throw new RuntimeException('Not implemented because we didn\'t need it yet');
	}

	public function offsetGet(mixed $offset): mixed {
		return $this->get($offset);
	}

	public function offsetSet(mixed $offset, mixed $value): void {
		throw new RuntimeException('Not implemented because we didn\'t need it yet');
	}

	public function offsetUnset(mixed $offset): void {
		throw new RuntimeException('Not implemented because we didn\'t need it yet');
	}
}

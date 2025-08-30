<?php

namespace Like\Eloquent\IdeHelper;

use ArrayAccess;
use Illuminate\Support\Arr;
use RuntimeException;

class Config implements ArrayAccess {
	private array $config;

	public function __construct(array $config) {
		$this->config = $config;
	}

	public function get($key, $defaultVaue = null) {
		return Arr::get($this->config, $key, $defaultVaue);
	}

	/**
	 * @param mixed $offset
	 */
	public function offsetExists($offset): bool {
		throw new RuntimeException('Not implemented because we didn\'t need it yet');
	}

	/**
	 * @param mixed $offset
	 *
	 * @return mixed
	 */
	public function offsetGet($offset) {
		return $this->get($offset);
	}

	/**
	 * @param mixed $offset
	 * @param mixed $value
	 */
	public function offsetSet($offset, $value): void {
		throw new RuntimeException('Not implemented because we didn\'t need it yet');
	}

	/**
	 * @param mixed $offset
	 */
	public function offsetUnset($offset): void {
		throw new RuntimeException('Not implemented because we didn\'t need it yet');
	}
}

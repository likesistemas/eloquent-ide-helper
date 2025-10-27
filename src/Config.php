<?php

namespace Like\Eloquent\IdeHelper;

use ArrayAccess;

// Importações condicionais para compatibilidade entre versões
if (interface_exists('Illuminate\Contracts\Config\Repository')) {
	interface ConfigRepositoryInterface extends \Illuminate\Contracts\Config\Repository {
	}
} else {
	interface ConfigRepositoryInterface {
	}
}

class Config implements ArrayAccess, ConfigRepositoryInterface {
	private array $config;

	public function __construct(array $config) {
		$this->config = $config;
	}

	public function get($key, $default = null) {
		return $this->arrayGet($this->config, $key, $default);
	}

	public function has($key): bool {
		return $this->arrayHas($this->config, $key);
	}

	public function all(): array {
		return $this->config;
	}

	public function set($key, $value = null): void {
		$this->arraySet($this->config, $key, $value);
	}

	public function prepend($key, $value): void {
		$array = $this->get($key, []);
		array_unshift($array, $value);
		$this->set($key, $array);
	}

	public function push($key, $value): void {
		$array = $this->get($key, []);
		$array[] = $value;
		$this->set($key, $array);
	}

	/**
	 * @param mixed $offset
	 */
	public function offsetExists($offset): bool {
		return isset($this->config[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return mixed
	 */
	public function offsetGet($offset) {
		return $this->config[$offset] ?? null;
	}

	/**
	 * @param mixed $offset
	 * @param mixed $value
	 */
	public function offsetSet($offset, $value): void {
		$this->config[$offset] = $value;
	}

	/**
	 * @param mixed $offset
	 */
	public function offsetUnset($offset): void {
		unset($this->config[$offset]);
	}

	/**
	 * Implementação própria do Arr::get para evitar dependência do Illuminate\Support\Arr
	 */
	private function arrayGet(array $array, $key, $default = null) {
		if (is_null($key)) {
			return $array;
		}

		if (isset($array[$key])) {
			return $array[$key];
		}

		if (strpos($key, '.') === false) {
			return $array[$key] ?? $default;
		}

		foreach (explode('.', $key) as $segment) {
			if (is_array($array) && array_key_exists($segment, $array)) {
				$array = $array[$segment];
			} else {
				return $default;
			}
		}

		return $array;
	}

	/**
	 * Implementação própria do Arr::has para evitar dependência do Illuminate\Support\Arr
	 */
	private function arrayHas(array $array, $key): bool {
		if (is_null($key)) {
			return false;
		}

		if (array_key_exists($key, $array)) {
			return true;
		}

		foreach (explode('.', $key) as $segment) {
			if (is_array($array) && array_key_exists($segment, $array)) {
				$array = $array[$segment];
			} else {
				return false;
			}
		}

		return true;
	}

	/**
	 * Implementação própria do Arr::set para evitar dependência do Illuminate\Support\Arr
	 */
	private function arraySet(array &$array, $key, $value): void {
		if (is_null($key)) {
			$array = $value;
			return;
		}

		$keys = explode('.', $key);
		$current = &$array;

		foreach ($keys as $i => $key) {
			if (count($keys) === 1) {
				break;
			}

			unset($keys[$i]);

			if (!isset($current[$key]) || !is_array($current[$key])) {
				$current[$key] = [];
			}

			$current = &$current[$key];
		}

		$current[array_shift($keys)] = $value;
	}
}

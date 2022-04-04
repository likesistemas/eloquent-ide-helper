<?php

namespace Like\Eloquent\IdeHelper\Tests;

use Like\Eloquent\IdeHelper\Application;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase {
	public function testInstance() {
		$this->assertInstanceOf(Application::class, new Application());
	}
}

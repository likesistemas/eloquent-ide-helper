<?php

namespace Like\Eloquent\IdeHelper;

use Like\Eloquent\IdeHelper\Commands\GenerateDocsModelsCommand;
use Symfony\Component\Console\Application as ConsoleApplication;

class Application extends ConsoleApplication {
	public function __construct() {
		parent::__construct('ide-helper');
		$this->add(new GenerateDocsModelsCommand());
	}
}

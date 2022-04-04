<?php

namespace Like\Eloquent\IdeHelper\Commands;

use Barryvdh\LaravelIdeHelper\Console\ModelsCommand;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateDocsModelsCommand extends AbstractCommand {
	public function __construct() {
		parent::__construct('generate-docs-models');
	}

	public function configure() {
		$this->setAliases(['models']);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$this->style->title('Writing documentation to models');

		$fileSystem = new Filesystem();
		$command = new ModelsCommand($fileSystem);
		$command->setLaravel(Container::getInstance());
		return $command->run(
			new ArrayInput(['--write' => true, '--reset' => true]),
			new ConsoleOutput()
		);
	}
}

<?php

namespace Like\Eloquent\IdeHelper\Commands;

use Barryvdh\LaravelIdeHelper\Console\ModelsCommand;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateDocsModelsCommand extends AbstractCommand {
	public function __construct() {
		parent::__construct('generate-docs-models');
	}

	public function configure(): void {
		$this->setAliases(['models']);
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {
		$this->style->title('Writing documentation to models');

		return $this->getModelsCommand()->run(
			new ArrayInput(['--write' => true, '--reset' => true]),
			new ConsoleOutput()
		);
	}

	private function getModelsCommandV2(): ModelsCommand {
		$fileSystem = new Filesystem();
		$command = new ModelsCommand($fileSystem); // @phpstan-ignore-line
		$command->setLaravel(Container::getInstance());
		return $command;
	}

	private function getModelsCommand(): ModelsCommand {
		$fileSystem = new Filesystem();
		$container = Container::getInstance();
		$config = $container->get('config');

		$engineResolverClass = 'Illuminate\View\Engines\EngineResolver';
		$fileViewFinderClass = 'Illuminate\View\FileViewFinder';
		$factoryClass = 'Illuminate\View\Factory';

		if (!class_exists($engineResolverClass) ||
			!class_exists($fileViewFinderClass) ||
			!class_exists($factoryClass)) {
			return $this->getModelsCommandV2();
		}

		$engineResolver = new $engineResolverClass();
		$finder = new $fileViewFinderClass($fileSystem, []);
		$dispatcher = new Dispatcher();
		$view = new $factoryClass($engineResolver, $finder, $dispatcher);
		
		$command = new ModelsCommand($fileSystem, $config, $view); // @phpstan-ignore-line
		$command->setLaravel($container);
		return $command;
	}
}

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

	public function configure(): void {
		$this->setAliases(['models']);
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {
		$this->style->title('Writing documentation to models');

		$fileSystem = new Filesystem();
		$container = Container::getInstance();
		$config = $container->get('config');
		
		// Create the real view factory with minimal dependencies
		$engineResolver = new \Illuminate\View\Engines\EngineResolver();
		$finder = new \Illuminate\View\FileViewFinder($fileSystem, []);
		$dispatcher = new \Illuminate\Events\Dispatcher();
		$view = new \Illuminate\View\Factory($engineResolver, $finder, $dispatcher);
		
		$command = new ModelsCommand($fileSystem, $config, $view);
		$command->setLaravel($container);
		return $command->run(
			new ArrayInput(['--write' => true, '--reset' => true]),
			new ConsoleOutput()
		);
	}
}

<?php

namespace Like\Eloquent\IdeHelper\Commands;

use Illuminate\Container\Container;
use Like\Eloquent\IdeHelper\Config;
use LogicException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

abstract class AbstractCommand extends Command {

	/**
	 * @var SymfonyStyle
	 */
	protected $style;

	public function initialize(InputInterface $input, OutputInterface $output) {
		$this->style = new SymfonyStyle($input, $output);

		if (! Container::getInstance()->bound('config')) {
			$this->loadConfig();
		}
	}

	private function loadConfig() {
		$cwd = getcwd() . DIRECTORY_SEPARATOR;
		$filename = 'ide-helper.php';
		$src = $cwd . $filename;

		if (! file_exists($src)) {
			throw new LogicException("Config file not found. Filename: {$src}.");
		}

		$config = include($src);

		if (! $config instanceof Config) {
			throw new LogicException("Config not is \Like\Eloquent\IdeHelper\Config.");
		}

		Container::getInstance()->instance('config', $config);

		$this->style->title('Reading configurations...');
		$this->style->text('Using base path: ' . base_path());
		$this->style->text('Using models folders: ' . join(', ', $config['ide-helper.model_locations']));
	}
}

<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Basic\CurlyBracesPositionFixer;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return ECSConfig::configure()
	->withPaths([
		__DIR__ . '/src',
	])
	->withSets([SetList::PSR_12])
	->withSpacing(Option::INDENTATION_TAB, PHP_EOL)
	->withConfiguredRule(
		ArraySyntaxFixer::class,
		['syntax' => 'short']
	)
	->withConfiguredRule(
		CurlyBracesPositionFixer::class,
		[
			'classes_opening_brace' => 'same_line',
			'functions_opening_brace' => 'same_line',
		]
	)
	->withConfiguredRule(
		VisibilityRequiredFixer::class,
		['elements' => ['property', 'method']]
	);

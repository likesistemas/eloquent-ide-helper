<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withTypeCoverageLevel(53)
    ->withDeadCodeLevel(51)
    ->withCodeQualityLevel(74)
    ->withImportNames();

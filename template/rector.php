<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__,
    ])
    ->withPhpSets(php74: true)
    ->withDowngradeSets(php74: true)
    ->withPreparedSets(
        codeQuality: true,
        codingStyle: true,
        earlyReturn: true,
        instanceOf: true,
        naming: true,
        symfonyCodeQuality: true,
    )
    ->withSkip([__DIR__.'/rector.php'])
    ->withTypeCoverageLevel(0);

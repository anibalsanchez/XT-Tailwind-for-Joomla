<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2024 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/build',
        __DIR__ . '/library/src',
        __DIR__ . '/package',
        __DIR__ . '/template',
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
    ->withSkip([
        __DIR__.'/build/templates/package/script.xttailwind.php',
    ])
    ->withTypeCoverageLevel(0);

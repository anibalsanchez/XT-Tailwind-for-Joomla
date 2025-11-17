<?php

declare(strict_types=1);

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2025 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__,
    ])
    ->withSkip([
        '*/platform/*',
        '*/vendor/*',
        '*/node_modules/*',
        '*Legacy*',
        __DIR__.'/build/templates/package/script.xtextlynews.php',
    ])
    ->withPhpSets(php74: true)
    ->withPreparedSets(
        codeQuality: true,
        codingStyle: true,
        // TODO: Enable typed properties
        typeDeclarations: false,
        naming: true,
        instanceOf: true,
        earlyReturn: true,
    )
    ->withRules([
    ]);

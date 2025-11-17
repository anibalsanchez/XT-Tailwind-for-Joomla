<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

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
use Utils\Rector\Rector\LegacyCallToJClassToJModernRector;

require_once '/home/anibalsanchez/7_Projects/Platform/rector-rule-joomla-legacy-to-joomla-modern/src/Rector/LegacyCallToJClassToJModernRector.php';

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/build',
        __DIR__.'/package',
        __DIR__.'/template',
    ])
    ->withSkip([
        '*/platform/*',
        '*/vendor/*',
        '*/node_modules/*',
        '*Legacy*',
        // __DIR__.'/build/templates/package/script.xtextlynews.php',
    ])
    ->withPhpSets(php74: true)
    ->withPreparedSets(
        codeQuality: true,
        codingStyle: true,
        earlyReturn: true,
        instanceOf: true,
        naming: true,
        // TODO: Enable typed properties
        typeDeclarations: false,
    )
    ->withRules([
        LegacyCallToJClassToJModernRector::class,
    ]);


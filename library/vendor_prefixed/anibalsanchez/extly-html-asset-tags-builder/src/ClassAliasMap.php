<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2024 Extly, CB. All rights reserved.
 * @license     https://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

if (class_exists(\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkDeferStylesheetTag::class)) {
    @class_alias(
        Extly\Infrastructure\Support\HtmlAsset\Asset\LinkDeferStylesheetTag::class,
        \Extly\Infrastructure\Support\HtmlAsset\Asset\LinkPreloadStylesheetTag::class
    );
}

if (class_exists(\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScript::class)) {
    @class_alias(
        Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScript::class,
        \Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScriptTag::class
    );
}

if (class_exists('XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkDeferStylesheetTag')) {
    @class_alias(
        XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkDeferStylesheetTag::class,
        'XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkPreloadStylesheetTag'
    );
}

if (class_exists('XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScript')) {
    @class_alias(
        XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScript::class,
        'XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScriptTag'
    );
}

<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2020 Extly, CB. All rights reserved.
 * @license     http://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkDeferStylesheetTag;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScript;

class_alias(
    LinkDeferStylesheetTag::class,
    'XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkPreloadStylesheetTag'
);
class_alias(
    LinkStylesheetByScript::class,
    'XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScriptTag'
);

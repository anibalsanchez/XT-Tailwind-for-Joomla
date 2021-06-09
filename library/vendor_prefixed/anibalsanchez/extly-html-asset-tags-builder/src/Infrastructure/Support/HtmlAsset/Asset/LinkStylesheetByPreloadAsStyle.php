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

namespace XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset;

use XTP_BUILD\Extly\Infrastructure\Creator\CreatorTrait;

final class LinkStylesheetByPreloadAsStyle extends HtmlAssetTagAbstract implements HtmlAssetTagInterface
{
    use CreatorTrait;

    const DEFAULT_ATTRIBUTES = [
        'rel' => 'preload',
        'as' => 'style',
        'onload' => 'this.onload=null;this.rel = "stylesheet"',
    ];

    public function __construct(string $href, array $attributes = [])
    {
        // Defer non-critical CSS - https://web.dev/defer-non-critical-css/
        // Firefox doesn't support it: https://caniuse.com/#feat=link-rel-preload
        $attributes['href'] = $href;
        $noScriptTag = LinkCriticalStylesheetTag::create($href);

        parent::__construct('link', '', array_merge(self::DEFAULT_ATTRIBUTES, $attributes), $noScriptTag);
    }
}

<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2021 Extly, CB. All rights reserved.
 * @license     http://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

namespace XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset;

use XTP_BUILD\Extly\Infrastructure\Creator\CreatorTrait;

final class LinkStylesheetByMediaPrint extends HtmlAssetTagAbstract implements HtmlAssetTagInterface
{
    use CreatorTrait;

    public const DEFAULT_ATTRIBUTES = [
        'rel' => 'stylesheet',
        'media' => 'print',
        'onload' => 'this.media="all"; this.onload=null;',
    ];

    public function __construct(string $href, array $attributes = [])
    {
        $attributes['href'] = $href;
        $noScriptTag = LinkCriticalStylesheetTag::create($href);

        // <link rel="stylesheet" href="/path/to/my.css" media="print" onload="this.media='all'; this.onload=null;">
        parent::__construct('link', '', array_merge(self::DEFAULT_ATTRIBUTES, $attributes), $noScriptTag);
    }
}

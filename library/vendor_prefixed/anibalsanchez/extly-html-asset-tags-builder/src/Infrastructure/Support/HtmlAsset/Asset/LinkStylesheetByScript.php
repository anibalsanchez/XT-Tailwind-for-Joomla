<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2025 Extly, CB. All rights reserved.
 * @license     https://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

namespace XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset;

use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Repository;

final class LinkStylesheetByScript extends HtmlAssetTagAbstract implements HtmlAssetTagInterface
{
    public function __construct(string $href, array $attributes = [])
    {
        $defaultAttributes = [
            'position' => Repository::GLOBAL_POSITION_BODY,
        ];

        $script = self::renderScript($href);
        $linkCriticalStylesheetTag = new LinkCriticalStylesheetTag($href);

        parent::__construct('script', $script, array_merge($defaultAttributes, $attributes), $linkCriticalStylesheetTag);
    }

    public static function renderScript($href)
    {
        return '!function(e){var t=document.createElement("link");t.rel="stylesheet",t.href="'.
            $href.
            '",t.type="text/css";var n=document.getElementsByTagName("link")[0];n.parentNode.insertBefore(t,n)}();';
    }
}

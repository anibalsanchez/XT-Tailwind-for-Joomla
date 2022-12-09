<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     Extly Infrastructure Support
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2022 Extly, CB. All rights reserved.
 * @license     https://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

namespace XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset;

final class LinkCriticalStylesheetTag extends HtmlAssetTagAbstract implements HtmlAssetTagInterface
{
    public function __construct(string $href, array $attributes = [])
    {
        $defaultAttributes = [
            'rel' => 'stylesheet',
            'type' => 'text/css',
        ];

        $attributes['href'] = $href;

        parent::__construct('link', '', array_merge($defaultAttributes, $attributes));
    }
}

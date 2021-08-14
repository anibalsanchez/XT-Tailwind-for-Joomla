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

namespace Tests\Infrastructure\Support\HtmlAsset;

use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByMediaPrint;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HtmlAssetTagsBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class LinkStylesheetByMediaPrintTest extends TestCase
{
    public function testBuildTag()
    {
        $linkDeferStylesheetTag = LinkStylesheetByMediaPrint::create(
            'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css'
        );
        $htmlAssetBuilder = HtmlAssetTagsBuilder::create();
        $tag = $htmlAssetBuilder->buildTag($linkDeferStylesheetTag);

        $this->assertSame(
            '<link rel="stylesheet" media="print" onload="this.media=&quot;all&quot;; this.onload=null;" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css">',
            $tag
        );
    }
}

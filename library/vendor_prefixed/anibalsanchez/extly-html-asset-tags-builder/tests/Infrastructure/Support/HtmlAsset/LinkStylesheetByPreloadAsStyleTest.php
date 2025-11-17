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

namespace Tests\Infrastructure\Support\HtmlAsset;

use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByPreloadAsStyle;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HtmlAssetTagsBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class LinkStylesheetByPreloadAsStyleTest extends TestCase
{
    public function testBuildTag()
    {
        $linkStylesheetByPreloadAsStyle = new LinkStylesheetByPreloadAsStyle(
            'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css'
        );
        $htmlAssetTagsBuilder = new HtmlAssetTagsBuilder();
        $tag = $htmlAssetTagsBuilder->buildTag($linkStylesheetByPreloadAsStyle);

        $this->assertSame(
            '<link rel="preload" as="style" onload="this.onload=null;this.rel = &quot;stylesheet&quot;" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css">',
            $tag
        );
    }
}

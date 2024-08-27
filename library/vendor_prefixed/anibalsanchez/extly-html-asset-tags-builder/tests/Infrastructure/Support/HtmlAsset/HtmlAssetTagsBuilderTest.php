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

namespace Tests\Infrastructure\Support\HtmlAsset;

use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\InlineScriptTag;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\InlineStyleTag;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkCriticalStylesheetTag;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkDeferStylesheetTag;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\LinkStylesheetByScript;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Asset\ScriptTag;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HtmlAssetTagsBuilder;
use XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\Repository;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class HtmlAssetTagsBuilderTest extends TestCase
{
    public function testInlineScriptTag()
    {
        $inlineScriptTag = new InlineScriptTag(
            'console.log("A Test");',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
            ]
        );

        $repository = (new Repository())->push($inlineScriptTag);

        $htmlAssetTagsBuilder = new HtmlAssetTagsBuilder($repository);
        $script = $htmlAssetTagsBuilder->generate(Repository::GLOBAL_POSITION_HEAD);
        $this->assertSame('<script>console.log("A Test");</script>', $script);
    }

    public function testInlineStyleTag()
    {
        $inlineStyleTag = new InlineStyleTag(
            'body {color: #fff}',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
            ]
        );

        $repository = (new Repository())->push($inlineStyleTag);

        $htmlAssetTagsBuilder = new HtmlAssetTagsBuilder($repository);
        $script = $htmlAssetTagsBuilder->generate(Repository::GLOBAL_POSITION_HEAD);
        $this->assertSame('<style>body {color: #fff}</style>', $script);
    }

    public function testInlines()
    {
        $inlineScriptTag = new InlineScriptTag(
            'console.log("A Test");',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
                'priority' => 100,
            ]
        );
        $inlineStyleTag = new InlineStyleTag(
            'body {color: #fff}',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
                'priority' => 50,
            ]
        );

        $repository = (new Repository())
            ->push($inlineScriptTag)
            ->push($inlineStyleTag);

        $htmlAssetTagsBuilder = new HtmlAssetTagsBuilder($repository);
        $script = $htmlAssetTagsBuilder->generate(Repository::GLOBAL_POSITION_HEAD);
        $this->assertSame('<style>body {color: #fff}</style><script>console.log("A Test");</script>', $script);
    }

    public function testScriptTag()
    {
        $remoteScriptTag = new ScriptTag(
            'https://cdnjs.cloudflare.com/ajax/libs/redux/4.0.4/redux.min.js',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
                'async' => true,
            ]
        );

        $repository = (new Repository())->push($remoteScriptTag);

        $htmlAssetTagsBuilder = new HtmlAssetTagsBuilder($repository);
        $script = $htmlAssetTagsBuilder->generate(Repository::GLOBAL_POSITION_HEAD);
        $this->assertSame('<script defer async src="https://cdnjs.cloudflare.com/ajax/libs/redux/4.0.4/redux.min.js"></script>', $script);
    }

    public function testLinkDeferStylesheetTag()
    {
        $linkDeferStylesheetTag = new LinkDeferStylesheetTag(
            'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
            ]
        );

        $repository = (new Repository())->push($linkDeferStylesheetTag);

        $htmlAssetTagsBuilder = new HtmlAssetTagsBuilder($repository);
        $script = $htmlAssetTagsBuilder->generate(Repository::GLOBAL_POSITION_HEAD);
        $this->assertSame(
            '<script>!function(e){var t=document.createElement("link");t.rel="stylesheet",t.href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css",t.type="text/css";var n=document.getElementsByTagName("link")[0];n.parentNode.insertBefore(t,n)}();</script><noscript><link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css"></noscript>',
            $script
        );
    }

    public function testLinkCriticalStylesheetTag()
    {
        $linkCriticalStylesheetTag = new LinkCriticalStylesheetTag(
            'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css'
        );

        $repository = (new Repository())->push($linkCriticalStylesheetTag);

        $htmlAssetTagsBuilder = new HtmlAssetTagsBuilder($repository);
        $script = $htmlAssetTagsBuilder->generate(Repository::GLOBAL_POSITION_HEAD);
        $this->assertSame('<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css">', $script);
    }

    public function testLinkStylesheetByScript()
    {
        $linkStylesheetByScript = new LinkStylesheetByScript(
            'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css'
        );

        $repository = (new Repository())->push($linkStylesheetByScript);

        $htmlAssetTagsBuilder = new HtmlAssetTagsBuilder($repository);
        $script = $htmlAssetTagsBuilder->generate(Repository::GLOBAL_POSITION_HEAD);
        $this->assertSame('<noscript><link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css"></noscript>', $script);

        $script = $htmlAssetTagsBuilder->generate(Repository::GLOBAL_POSITION_BODY);
        $this->assertSame('<script>!function(e){var t=document.createElement("link");t.rel="stylesheet",t.href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css",t.type="text/css";var n=document.getElementsByTagName("link")[0];n.parentNode.insertBefore(t,n)}();</script>', $script);
    }

    public function testRemotes()
    {
        $remoteScriptTag = new ScriptTag(
            'https://cdnjs.cloudflare.com/ajax/libs/redux/4.0.4/redux.min.js',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
                'priority' => 100,
                'async' => true,
                'defer' => false,
            ]
        );
        $linkDeferStylesheetTag = new LinkDeferStylesheetTag(
            'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
                'priority' => 50,
            ]
        );
        $inlineScriptTag = new InlineScriptTag(
            'console.log("A Test");',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
                'priority' => 10,
            ]
        );
        $inlineStyle1 = new InlineStyleTag(
            'body {color: #fff}',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
                'priority' => 5,
            ]
        );
        $inlineStyle2 = new InlineStyleTag(
            'p {color: #f00}',
            [
                'position' => Repository::GLOBAL_POSITION_HEAD,
            ]
        );

        $repository = (new Repository())
            ->push($remoteScriptTag)
            ->push($linkDeferStylesheetTag)
            ->push($inlineScriptTag)
            ->push($inlineStyle1)
            ->push($inlineStyle2);

        $htmlAssetTagsBuilder = new HtmlAssetTagsBuilder($repository);
        $script = $htmlAssetTagsBuilder->generate(Repository::GLOBAL_POSITION_HEAD);
        $this->assertSame(
            '<style>body {color: #fff}</style><script>console.log("A Test");</script><script>!function(e){var t=document.createElement("link");t.rel="stylesheet",t.href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css",t.type="text/css";var n=document.getElementsByTagName("link")[0];n.parentNode.insertBefore(t,n)}();</script><script async src="https://cdnjs.cloudflare.com/ajax/libs/redux/4.0.4/redux.min.js"></script><style>p {color: #f00}</style><noscript><link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.6/tailwind.min.css"></noscript>',
            $script
        );
    }
}

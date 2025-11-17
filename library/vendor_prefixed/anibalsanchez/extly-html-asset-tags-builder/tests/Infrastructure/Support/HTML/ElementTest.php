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

namespace Tests\Infrastructure\Support\HTML;

class ElementTest extends \PHPUnit\Framework\TestCase
{
    public function testCanCreateElement()
    {
        $element = new \XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $this->assertEquals('<a href="/documents">Documents</a>', (string) $element);
    }

    public function testCanSetTagName()
    {
        $element = new \XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->setTagName('span');
        $this->assertEquals('<span href="/documents">Documents</span>', (string) $element);
    }

    public function testCanSetInnerHTML()
    {
        $element = new \XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->setInnerHTML('Documenten');
        $this->assertEquals('<a href="/documents">Documenten</a>', (string) $element);
    }

    public function testCanCreateVoidElement()
    {
        $element = new \XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HTML\Element('input', null, ['type' => 'text']);
        $this->assertEquals('<input type="text">', (string) $element);
    }

    public function testCanAddClass()
    {
        $element = new \XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->addClass('button');
        $this->assertEquals('<a href="/documents" class="button">Documents</a>', (string) $element);
    }

    public function testCanAddClasses()
    {
        $element = new \XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->addClass('button button-documents');
        $this->assertEquals('<a href="/documents" class="button button-documents">Documents</a>', (string) $element);
    }

    public function testCanRemoveClass()
    {
        $element = new \XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->addClass('button button-documents');
        $element->removeClass('button');
        $this->assertEquals('<a href="/documents" class="button-documents">Documents</a>', (string) $element);
    }
}

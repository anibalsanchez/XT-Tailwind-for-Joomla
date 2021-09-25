<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Studiow\HTML\Test;

class ElementTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function can_create_element()
    {
        $element = new \XTP_BUILD\Studiow\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $this->assertEquals('<a href="/documents">Documents</a>', (string) $element);
    }

    /**
     * @test
     */
    public function can_set_tagName()
    {
        $element = new \XTP_BUILD\Studiow\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->setTagName("span");
        $this->assertEquals('<span href="/documents">Documents</span>', (string) $element);
    }

    /**
     * @test
     */
    public function can_set_innerHTML()
    {
        $element = new \XTP_BUILD\Studiow\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->setInnerHTML("Documenten");
        $this->assertEquals('<a href="/documents">Documenten</a>', (string) $element);
    }

    /**
     * @test
     */
    public function can_create_void_element()
    {
        $element = new \XTP_BUILD\Studiow\HTML\Element('input', null, ['type' => "text"]);
        $this->assertEquals('<input type="text">', (string) $element);
    }

    /**
     * @test
     */
    public function can_add_class()
    {
        $element = new \XTP_BUILD\Studiow\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->addClass('button');
        $this->assertEquals('<a href="/documents" class="button">Documents</a>', (string) $element);
    }

    /**
     * @test
     */
    public function can_add_classes()
    {
        $element = new \XTP_BUILD\Studiow\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->addClass('button button-documents');
        $this->assertEquals('<a href="/documents" class="button button-documents">Documents</a>', (string) $element);
    }

    /**
     * @test
     */
    public function can_remove_class()
    {
        $element = new \XTP_BUILD\Studiow\HTML\Element('a', 'Documents', ['href' => '/documents']);
        $element->addClass('button button-documents');
        $element->removeClass('button');
        $this->assertEquals('<a href="/documents" class="button-documents">Documents</a>', (string) $element);
    }

}

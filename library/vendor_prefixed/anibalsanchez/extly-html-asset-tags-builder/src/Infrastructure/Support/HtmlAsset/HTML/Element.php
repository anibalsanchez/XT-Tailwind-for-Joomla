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

namespace XTP_BUILD\Extly\Infrastructure\Support\HtmlAsset\HTML;

/* Based on https://packagist.org/packages/studiow/html */

class Element
{
    use HasAttributesTrait;

    /**
     * @var string
     */
    private $tagname;

    private $innerHTML;

    private static $voidElements = [
        'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'keygen',
        'link', 'meta', 'param', 'source', 'track', 'wbr',
    ];

    /**
     * Constructor.
     *
     * @param string $tagname
     * @param string $innerHTML
     * @param array  $attributes
     */
    public function __construct($tagname, $innerHTML = null, $attributes = [])
    {
        $this->setTagName($tagname);
        $this->setInnerHTML($innerHTML);
        $this->setAttributes($attributes instanceof Attributes ? $attributes : new Attributes((array) $attributes));
    }

    /**
     * Convert element to HTML.
     *
     * @return string
     */
    public function __toString()
    {
        if ($this->isVoidElement()) {
            return $this->getOpenTag();
        }

        return $this->getOpenTag().$this->getInnerHTML().$this->getCloseTag();
    }

    /**
     * Set the tagname.
     *
     * @param string $tagname
     *
     * @return \Extly\Infrastructure\Support\HtmlAsset\HTML\Element
     */
    public function setTagName($tagname)
    {
        $this->tagname = strtolower($tagname);

        return $this;
    }

    /**
     * Get the tagname.
     *
     * @return string
     */
    public function getTagName()
    {
        return $this->tagname;
    }

    /**
     * set the content of the element.
     *
     * @param string $innerHTML
     *
     * @return \Extly\Infrastructure\Support\HtmlAsset\HTML\Element
     */
    public function setInnerHTML($innerHTML)
    {
        $this->innerHTML = $innerHTML;

        return $this;
    }

    /**
     * get the content of the element.
     *
     * @return string
     */
    public function getInnerHTML()
    {
        return $this->innerHTML;
    }

    /**
     * Check if the current tagname if for a void element.
     *
     * @return bool
     */
    public function isVoidElement()
    {
        return \in_array($this->getTagName(), self::$voidElements);
    }

    /**
     * Create HTML open tag, or a HTML5 void tag.
     *
     * @return string
     */
    private function getOpenTag()
    {
        $content = trim($this->tagname . ' '.(string) $this->attributes);

        return sprintf('<%s>', $content);
    }

    /**
     * Create HTML close tag.
     *
     * @return string
     */
    private function getCloseTag()
    {
        return sprintf('</%s>', $this->tagname);
    }
}

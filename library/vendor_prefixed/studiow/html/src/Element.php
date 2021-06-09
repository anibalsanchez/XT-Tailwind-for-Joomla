<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Studiow\HTML;

class Element
{

    use HasAttributesTrait;

    /**
     * @var string
     */
    private $tagname, $innerHTML;
    private static $voidElements = [
        'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'keygen',
        'link', 'meta', 'param', 'source', 'track', 'wbr'
    ];

    /**
     * Constructor
     * @param string $tagname
     * @param string $innerHTML
     * @param array $attributes
     */
    public function __construct($tagname, $innerHTML = null, $attributes = [])
    {
        $this->setTagName($tagname);
        $this->setInnerHTML($innerHTML);
        $this->setAttributes($attributes instanceof Attributes ? $attributes : new Attributes((array) $attributes));
    }

    /**
     * Set the tagname
     * @param string $tagname
     * @return \Studiow\HTML\Element
     */
    public function setTagName($tagname)
    {
        $this->tagname = strtolower($tagname);
        return $this;
    }

    /**
     * Get the tagname
     * @return string
     */
    public function getTagName()
    {
        return $this->tagname;
    }

    /**
     * set the content of the element
     * @param string $innerHTML
     * @return \Studiow\HTML\Element
     */
    public function setInnerHTML($innerHTML)
    {
        $this->innerHTML = $innerHTML;
        return $this;
    }

    /**
     * get the content of the element
     * @return string
     */
    public function getInnerHTML()
    {
        return $this->innerHTML;
    }

    /**
     * Check if the current tagname if for a void element
     * @return bool
     */
    public function isVoidElement()
    {
        return in_array($this->getTagName(), self::$voidElements);
    }

    /**
     * Convert element to HTML
     * @return string
     */
    public function __toString()
    {
        if ($this->isVoidElement()) {
            return $this->getOpenTag();
        }
        return $this->getOpenTag() . $this->getInnerHTML() . $this->getCloseTag();
    }

    /**
     * Create HTML open tag, or a HTML5 void tag 
     * @return string
     */
    private function getOpenTag()
    {
        $content = trim("{$this->tagname} " . (string) $this->attributes);
        return "<{$content}>";
    }

    /**
     * Create HTML close tag 
     * @return string
     */
    private function getCloseTag()
    {
        return "</{$this->tagname}>";
    }

}

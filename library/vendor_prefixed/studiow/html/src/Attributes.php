<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Studiow\HTML;

class Attributes extends \ArrayObject
{

    /**
     * Convert attributes to HTML 
     * @return string
     */
    public function __toString()
    {
        $out = [];
        foreach ($this as $attribute => $value) {
            if (strlen((string) $value) > 0) {
                if (is_bool($value)) {
                    $out[] = $attribute;
                } else {
                    $out[] = $attribute . '="' . htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8') . '"';
                }
            }
        }
        return implode(' ', $out);
    }

    /**
     * Determine if the element has a certain class
     * @param string $classname
     * @return bool
     */
    public function hasClass($classname)
    {
        $classArr = $this->getClassArray();
        return in_array($classname, $classArr);
    }

    /**
     * Add a class
     * @param string $classname
     * @return \Studiow\HTML\Attributes
     */
    public function addClass($classname)
    {
        $classArr = $this->getClassArray();
        $classArr[] = $classname;
        return $this->setClassArray($classArr);
    }

    /**
     * Remove a class
     * @param string $classname
     * @return \Studiow\HTML\Attributes
     */
    public function removeClass($classname)
    {
        $classArr = array_diff($this->getClassArray(), [$classname]);
        return $this->setClassArray($classArr);
    }

    /**
     * Convert classes to array
     * @return array
     */
    private function getClassArray()
    {
        if ($this->offsetExists('class')) {
            return array_unique(explode(' ', $this['class']));
        }
        return [];
    }

    /**
     * Set classes by array
     * @param array $classArr
     * @return \Studiow\HTML\Attributes
     */
    private function setClassArray(array $classArr)
    {
        $this['class'] = implode(' ', array_unique($classArr));
        return $this;
    }

}

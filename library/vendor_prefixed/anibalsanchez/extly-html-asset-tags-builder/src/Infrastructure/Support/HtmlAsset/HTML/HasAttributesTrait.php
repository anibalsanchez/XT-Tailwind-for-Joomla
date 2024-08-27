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

trait HasAttributesTrait
{
    /**
     * Set the attributes container.
     *
     * @var \Extly\Infrastructure\Support\HtmlAsset\HTML\Attributes
     */
    protected $attributes;

    public function setAttributes(Attributes $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Get the attributes container.
     *
     * @return \Extly\Infrastructure\Support\HtmlAsset\HTML\Attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Add a class.
     *
     * @param string $classname
     *
     * @return \Extly\Infrastructure\Support\HtmlAsset\HTML\Element
     */
    public function addClass($classname)
    {
        $this->getAttributes()->addClass($classname);

        return $this;
    }

    /**
     * Remove a class.
     *
     * @param string $classname
     *
     * @return \Extly\Infrastructure\Support\HtmlAsset\HTML\Element
     */
    public function removeClass($classname)
    {
        $this->getAttributes()->removeClass($classname);

        return $this;
    }

    /**
     * Determine if the element has a certain class.
     *
     * @param string $classname
     *
     * @return bool
     */
    public function hasClass($classname)
    {
        return $this->getAttributes()->hasClass($classname);
    }

    /**
     * Set attribute.
     *
     * @param string $name
     *
     * @return \Extly\Infrastructure\Support\HtmlAsset\HTML\Element
     */
    public function setAttribute($name, $value)
    {
        $this->getAttributes()[$name] = $value;

        return $this;
    }

    /**
     * Remove attribute.
     *
     * @param string $name
     */
    public function removeAttribute($name)
    {
        if (\array_key_exists($name, $this->getAttributes())) {
            unset($this->getAttributes()[$name]);
        }
    }

    /**
     * Get attribute value.
     *
     * @param type $name
     *
     * @return mixed null if the attribute does not exist, otherwise the current value of the attribute
     */
    public function getAttribute($name)
    {
        return $this->getAttributes()[$name] ?? null;
    }
}

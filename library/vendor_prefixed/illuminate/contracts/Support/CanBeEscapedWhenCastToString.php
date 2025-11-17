<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Illuminate\Contracts\Support;

interface CanBeEscapedWhenCastToString
{
    /**
     * Indicate that the object's string representation should be escaped when __toString is invoked.
     *
     * @param  bool  $escape
     * @return $this
     */
    public function escapeWhenCastingToString($escape = true);
}

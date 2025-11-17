<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Illuminate\Support\Traits;

trait Tappable
{
    /**
     * Call the given Closure with this instance then return the instance.
     *
     * @param  callable|null  $callback
     * @return $this|\Illuminate\Support\HigherOrderTapProxy
     */
    public function tap($callback = null)
    {
        return XTP_tap($this, $callback);
    }
}

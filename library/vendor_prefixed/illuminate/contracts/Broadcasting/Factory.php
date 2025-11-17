<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Illuminate\Contracts\Broadcasting;

interface Factory
{
    /**
     * Get a broadcaster implementation by name.
     *
     * @param  string|null  $name
     * @return \Illuminate\Contracts\Broadcasting\Broadcaster
     */
    public function connection($name = null);
}

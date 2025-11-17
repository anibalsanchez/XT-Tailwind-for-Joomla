<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Illuminate\Contracts\Translation;

interface HasLocalePreference
{
    /**
     * Get the preferred locale of the entity.
     *
     * @return string|null
     */
    public function preferredLocale();
}

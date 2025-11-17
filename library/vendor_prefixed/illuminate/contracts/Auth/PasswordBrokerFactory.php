<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Illuminate\Contracts\Auth;

interface PasswordBrokerFactory
{
    /**
     * Get a password broker instance by name.
     *
     * @param  string|null  $name
     * @return mixed
     */
    public function broker($name = null);
}

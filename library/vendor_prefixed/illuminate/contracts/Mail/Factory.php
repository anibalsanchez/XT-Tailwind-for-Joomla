<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Illuminate\Contracts\Mail;

interface Factory
{
    /**
     * Get a mailer instance by name.
     *
     * @param  string|null  $name
     * @return \Illuminate\Contracts\Mail\Mailer
     */
    public function mailer($name = null);
}

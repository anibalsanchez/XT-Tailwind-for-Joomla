<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Illuminate\Contracts\Validation;

interface UncompromisedVerifier
{
    /**
     * Verify that the given data has not been compromised in data leaks.
     *
     * @param  array  $data
     * @return bool
     */
    public function verify($data);
}

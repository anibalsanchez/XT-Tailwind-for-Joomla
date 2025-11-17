<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Illuminate\Contracts\Database\Eloquent;

interface CastsInboundAttributes
{
    /**
     * Transform the attribute to its underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes);
}

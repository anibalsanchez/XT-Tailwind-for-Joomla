<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Illuminate\Support;

use XTP_BUILD\Carbon\Carbon as BaseCarbon;
use XTP_BUILD\Carbon\CarbonImmutable as BaseCarbonImmutable;

class Carbon extends BaseCarbon
{
    /**
     * {@inheritdoc}
     */
    public static function setTestNow($testNow = null)
    {
        BaseCarbon::setTestNow($testNow);
        BaseCarbonImmutable::setTestNow($testNow);
    }
}

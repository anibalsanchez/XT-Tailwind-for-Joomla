<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

namespace XTP_BUILD\Psr\Clock;

use DateTimeImmutable;

interface ClockInterface
{
    /**
     * Returns the current time as a DateTimeImmutable Object
     */
    public function now(): DateTimeImmutable;
}

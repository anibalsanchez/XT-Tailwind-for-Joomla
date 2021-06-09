<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

/*
 * @package     anibalsanchez/create-pattern
 *              A lightweight PHP implementation of the Static Create Pattern using a trait.
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2018-2019 Extly, CB. All rights reserved.
 * @license     http://www.opensource.org/licenses/mit-license.html  MIT License
 *
 * @see         https://www.extly.com
 */

namespace XTP_BUILD\Extly\Infrastructure\Creator;

use ReflectionClass;

trait CreatorTrait
{
    final public static function create()
    {
        $class = static::class;
        $args = func_get_args();
        $reflect = new ReflectionClass($class);

        return $reflect->newInstanceArgs($args);
    }
}

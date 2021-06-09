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

trait SingletonTrait
{
    private static $instance = null;

    final public static function getInstance()
    {
        if (null !== self::$instance) {
            return self::$instance;
        }

        $class = static::class;
        $args = func_get_args();
        $reflect = new ReflectionClass($class);
        self::$instance = $reflect->newInstanceArgs($args);

        return self::$instance;
    }
}

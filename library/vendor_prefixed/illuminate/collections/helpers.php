<?php
/* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */

use XTP_BUILD\Illuminate\Support\Arr;
use XTP_BUILD\Illuminate\Support\Collection;

if (! function_exists('XTP_collect')) {
    /**
     * Create a collection from the given value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Support\Collection
     */
    function XTP_collect($value = null)
    {
        return new Collection($value);
    }
}

if (! function_exists('XTP_data_fill')) {
    /**
     * Fill in data where it's missing.
     *
     * @param  mixed  $target
     * @param  string|array  $key
     * @param  mixed  $value
     * @return mixed
     */
    function XTP_data_fill(&$target, $key, $value)
    {
        return XTP_data_set($target, $key, $value, false);
    }
}

if (! function_exists('XTP_data_get')) {
    /**
     * Get an item from an array or object using "dot" notation.
     *
     * @param  mixed  $target
     * @param  string|array|int|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    function XTP_data_get($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        foreach ($key as $i => $segment) {
            unset($key[$i]);

            if (is_null($segment)) {
                return $target;
            }

            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (! is_array($target)) {
                    return XTP_value($default);
                }

                $result = [];

                foreach ($target as $item) {
                    $result[] = XTP_data_get($item, $key);
                }

                return in_array('*', $key) ? Arr::collapse($result) : $result;
            }

            if (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } else {
                return XTP_value($default);
            }
        }

        return $target;
    }
}

if (! function_exists('XTP_data_set')) {
    /**
     * Set an item on an array or object using dot notation.
     *
     * @param  mixed  $target
     * @param  string|array  $key
     * @param  mixed  $value
     * @param  bool  $overwrite
     * @return mixed
     */
    function XTP_data_set(&$target, $key, $value, $overwrite = true)
    {
        $segments = is_array($key) ? $key : explode('.', $key);

        if (($segment = array_shift($segments)) === '*') {
            if (! Arr::accessible($target)) {
                $target = [];
            }

            if ($segments) {
                foreach ($target as &$inner) {
                    XTP_data_set($inner, $segments, $value, $overwrite);
                }
            } elseif ($overwrite) {
                foreach ($target as &$inner) {
                    $inner = $value;
                }
            }
        } elseif (Arr::accessible($target)) {
            if ($segments) {
                if (! Arr::exists($target, $segment)) {
                    $target[$segment] = [];
                }

                XTP_data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite || ! Arr::exists($target, $segment)) {
                $target[$segment] = $value;
            }
        } elseif (is_object($target)) {
            if ($segments) {
                if (! isset($target->{$segment})) {
                    $target->{$segment} = [];
                }

                XTP_data_set($target->{$segment}, $segments, $value, $overwrite);
            } elseif ($overwrite || ! isset($target->{$segment})) {
                $target->{$segment} = $value;
            }
        } else {
            $target = [];

            if ($segments) {
                XTP_data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite) {
                $target[$segment] = $value;
            }
        }

        return $target;
    }
}

if (! function_exists('XTP_head')) {
    /**
     * Get the first element of an array. Useful for method chaining.
     *
     * @param  array  $array
     * @return mixed
     */
    function XTP_head($array)
    {
        return reset($array);
    }
}

if (! function_exists('XTP_last')) {
    /**
     * Get the last element from an array.
     *
     * @param  array  $array
     * @return mixed
     */
    function XTP_last($array)
    {
        return end($array);
    }
}

if (! function_exists('XTP_value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function XTP_value($value, ...$args)
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }
}

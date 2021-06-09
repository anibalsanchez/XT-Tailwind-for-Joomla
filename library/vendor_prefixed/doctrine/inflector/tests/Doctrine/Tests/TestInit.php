<?php /* This file has been prefixed by <PHP-Prefixer> for "XT Tailwind CSS" */
/*
 * This file bootstraps the test environment.
 */
namespace XTP_BUILD\Doctrine\Tests;

error_reporting(E_ALL | E_STRICT);

// register silently failing autoloader
spl_autoload_register(function($class)
{
    if (0 === strpos($class, 'XTP_BUILD\Doctrine\Tests\\')) {
        $path = __DIR__.'/../../'.strtr($class, '\\', '/').'.php';
        if (is_file($path) && is_readable($path)) {
            require_once $path;

            return true;
        }
    } else if (0 === strpos($class, 'XTP_BUILD\Doctrine\Common\\')) {
        $path = __DIR__.'/../../../lib/'.($class = strtr($class, '\\', '/')).'.php';
        if (is_file($path) && is_readable($path)) {
            require_once $path;

            return true;
        }
    }
});

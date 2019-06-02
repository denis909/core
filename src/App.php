<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

use Closure;

abstract class App
{

    protected static $_services = [];

    protected static function service($name, $default = null)
    {
        if (array_key_exists($name, static::$_services))
        {
            return static::$_services[$name];
        }

        if ($default instanceof Closure)
        {
            static::$_services[$name] = $default();
        }
        else
        {
            static::$_services[$name] = $default;
        }
        
        return static::$_services[$name];
    }

}
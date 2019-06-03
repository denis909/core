<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

trait IsSubclassTrait
{

    public static function isSubclass($object, $class = null)
    {
        if (!$class)
        {
            $class = get_called_class();
        }

        if (is_object($object))
        {
            if ($object instanceof $class)
            {
                return true;
            }
        }
        elseif (is_string($object))
        {
            return is_subclass_of($object, $class, true);
        }

        return false;
    }

}
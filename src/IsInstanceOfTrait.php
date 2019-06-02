<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

trait IsInstanceOfTrait
{

    public static function isInstanceOf($object, $class = null)
    {
        if (is_object($object))
        {
            if (!$class)
            {
                $class = get_called_class();
            }

            if ($object instanceof $class)
            {
                return true;
            }
        }

        return false;
    }

}

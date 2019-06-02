<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

trait InstanceOfTrait
{

    public static function instanceOf($object)
    {
        if (is_object($object))
        {
            $class = get_called_class();

            if ($object instanceof $class)
            {
                return true;
            }
        }

        return false;
    }

}

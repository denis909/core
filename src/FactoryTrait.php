<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

trait FactoryTrait
{

    public static function factory($params = [])
    {
        $class = get_called_class();

        $object = new $class;

        foreach($params as $key => $value)
        {
            $object->$key = $value;
        }

        return $object;
    }

}
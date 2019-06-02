<?php

/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

use stdClass;
use ArrayAccess;

class ArrayObject extends stdClass implements ArrayAccess
{

    protected $_container = [];

    public function __construct($params = [])
    {
        $this->_container = $params;
    }

    public function __isset($name)
    {
        return isset($this->_container[$name]);
    }

    public function __get($name)
    {
        if (!array_key_exists($name, $this->_container))
        {
            return null;
        }

        return $this->_container[$name];
    }

    public function __set($name, $value)
    {
        $this->_container[$name] = $value;
    }    

    public function offsetSet($offset, $value)
    {
        if (is_null($offset))
        {
            $this->_container[] = $value;
        }
        else
        {
            $this->_container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->_container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->_container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->_container[$offset]) ? $this->_container[$offset] : null;
    }

}
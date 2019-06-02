<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

class DbExpression
{

    protected $_sql;

    public function __construct($sql)
    {
        $this->_sql = $sql;
    }

    public function __toString()
    {
        return $this->_sql;
    } 

    public function getSql()
    {
        return $this->_expression;
    }

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
<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

class Db
{

    protected $_adapter;

    public function __construct($adapter)
    {
        $this->_adapter = $adapter;
    }

    public function getAdapter()
    {
        return $this->_adapter;
    }

    public function createCommand()
    {
        return new DbCommand($this);
    }

    public function query($sql, $params = [])
    {
        return $this->getAdapter()->query($sql);
    }

    public function insertId()
    {
        return $this->getAdapter()->insertId();
    }

    public function escape($string)
    {
        return $this->getAdapter()->escape($string);
    }

    public function count($sql, $params = [])
    {
        $params = $this->escapeParams($params);

        $sql = strtr($sql, $params);

        return $this->getAdapter()->count($sql);
    }

    public function queryAll($sql, $params = [])
    {
        $params = $this->escapeParams($params);

        $sql = strtr($sql, $params);

        return $this->getAdapter()->queryAll($sql);
    }

    public function queryOne($sql, $params = [])
    {
        $params = $this->escapeParams($params);

        $sql = strtr($sql, $params);

        return $this->getAdapter()->queryOne($sql);
    }

    public function escapeParams($params = [])
    {
        foreach($params as $key => $value)
        {
            if (DbExpression::instanceOf($value))
            {
                $params[$key] = $value->getSql();
            }
            else
            {
                $params[$key] = "'" . $this->escape($value) . "'";
            }
        }

        return $params;
    }

    public function findAll()
    {
        $command = $this->createCommand();

        $sql = call_user_func_array([$command, 'findAll'], func_get_args());
   
        return $this->queryAll($sql);
    }

    public function findOne()
    {
        $command = $this->createCommand();

        $sql = call_user_func_array([$command, 'findOne'], func_get_args());
    
        return $this->queryOne($sql);
    }

    public function insert()
    {
        $command = $this->createCommand();

        $sql = call_user_func_array([$command, 'insert'], func_get_args());
    
        $result = $this->query($sql);

        if (!$result)
        {
            return false;
        }

        return $this->insertId();
    }

    public function update()
    {
        $command = $this->createCommand();

        $sql = call_user_func_array([$command, 'update'], func_get_args());

        return $this->query($sql);
    }

    public function delete()
    {
        $command = $this->createCommand();

        $sql = call_user_func_array([$command, 'delete'], func_get_args());

        return $this->query($sql);
    }

}
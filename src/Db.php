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

    public function getConnection()
    {
        return $this->getAdapter()->getConnection();
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
        if(is_null($string))
        {
            return 'NULL';
        }

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

        $return = $this->getAdapter()->queryAll($sql);

        foreach($return as $key => $value)
        {
            $return[$key] = new ArrayObject($value);
        }

        return $return;
    }

    public function queryOne($sql, $params = [])
    {
        $params = $this->escapeParams($params);

        $sql = strtr($sql, $params);

        $return = $this->getAdapter()->queryOne($sql);
   
        if ($return)
        {
            $return = new ArrayObject($return);
        }

        return $return;
    }

    public function escapeParams($params = [])
    {
        foreach($params as $key => $value)
        {
            if (DbExpression::isSubclassOf($value))
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

    public function findAll($from, $where = null, $params = [], $suffix = null)
    {
        $command = $this->createCommand();

        $sql = $command->findAll($from, $where, $params, $suffix);
   
        return $this->queryAll($sql);
    }

    public function findOne($from, $where = null, $params = [], $suffix = '')
    {
        $command = $this->createCommand();

        $sql = $command->findOne($from, $where, $params, $suffix);
    
        return $this->queryOne($sql);
    }

    public function insert($table, $values = [])
    {
        $command = $this->createCommand();

        $sql = $command->insert($table, $values);
    
        $result = $this->query($sql);

        if (!$result)
        {
            return false;
        }

        return $this->insertId();
    }

    public function update($table, $values, $where, $params = [])
    {
        $command = $this->createCommand();

        $sql = $command->update($table, $values, $where, $params);

        return $this->query($sql);
    }

    public function delete($table, $where, $params = [])
    {
        $command = $this->createCommand();

        $sql = $command->delete($table, $where, $params);

        return $this->query($sql);
    }

}
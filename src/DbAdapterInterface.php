<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

interface DbAdapterInterface
{

    function __construct($config);

    function __destruct();

    function query($sql);

    function escape($sql);

    function insertId();

    function queryOne($sql);

    function queryAll($sql);

    function count($sql);

}
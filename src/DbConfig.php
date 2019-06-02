<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

class DbConfig
{

    public $host;

    public $user;

    public $password;

    public $db;

    public $charset;

    public function __construct($host, $user, $password, $db, $charset = 'utf8')
    {
        $this->host = $host;

        $this->user = $user;

        $this->password = $password;

        $this->db = $db;
        
        $this->charset = $charset;        
    }

}
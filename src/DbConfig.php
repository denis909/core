<?php
/**
 * @package Core
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

    public $charset = "utf8";

    public function __construct($host, $user, $password, $db)
    {
        $this->host = $host;

        $this->user = $user;

        $this->password = $password;

        $this->db = $db;
    }

}
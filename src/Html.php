<?php
/**
 * @package Core
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

class Html
{

    public function escape($string, $encoding = 'utf-8', $specialCharsFlags = null)
    {
        if (!$specialCharsFlags)
        {
            $specialCharsFlags = ENT_QUOTES | ENT_SUBSTITUTE;
        }

        return htmlspecialchars($string, $specialCharsFlags, $encoding);
    }

}
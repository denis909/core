<?php
/**
 * @package PHP Micro Framework
 * @license MIT License
 * @link    http://denis909.spb.ru/en
 */
namespace denis909\core;

class View
{

    use RenderFileTrait;

    public $viewPath;

    public function getViewPath()
    {
        return $this->viewPath;
    }

    public function escape($string, $encoding = 'utf-8', $specialCharsFlags = null)
    {
        return Html::escape($string, $encoding, $specialCharsFlags);
    }

    public function render($template, $params = [])
    {
        $filename = $this->getViewPath() . '/' . $template . '.php';

        return $this->renderFile($filename, $params);
    }

}
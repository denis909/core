<?php
/**
 * @package Core
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

    public function render($template, $params = [])
    {
        $filename = $this->getViewPath() . '/' . $template . '.php';

        return $this->renderFile($filename);
    }

}
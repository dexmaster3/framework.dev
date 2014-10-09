<?php

abstract class Core_BaseController
{
    public $path;
    public $params = null;

    public function __construct($path, $params)
    {
        $this->path = $path;
        $this->params = $params;
    }
    public function make($viewTemplate, $params = null)
    {
        $viewEngine = new Core_View();
        $module = explode('_', get_class($this))[0];
        $templateFile = $viewEngine->findTemplate($viewTemplate, $module);
        return $viewEngine->make($templateFile, $params);
    }
}
<?php

class Lib_Core_FrontHandlerController
{
    protected $request;

    public function handleRequest()
    {
        $rawUri = $this->currentRequest();
        $splitUri = explode("/", $rawUri);
        $modules = glob('app/*', GLOB_ONLYDIR);

        foreach ($modules as $module) {
            $moduleName = substr($module, strpos($module, '/')+1);
            if ($splitUri[1] === $moduleName) {
                //handle area for going to module controller
                return $this->parseController($module, $splitUri);
            }
        }
    }

    protected function parseController($module, $splitUri)
    {
        $moduleControllers = glob($module.'/controllers/*');
        foreach ($moduleControllers as $moduleController) {
            $controllerTitle = strpos(strtolower($moduleController), $splitUri[2]);
            if ($controllerTitle) {
                return $moduleController;
            }
        }
        return null;
    }

    protected function currentRequest()
    {
        $this->request = $_SERVER[REQUEST_URI];
        return $this->request;
    }
}
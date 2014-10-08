<?php

class Core_Router
{
    private $configs;
    private $request;

    public function __construct($configs, $request)
    {
        $this->configs = $configs;
        $this->request = $request;
    }

    public function getRequestPath()
    {
        $path = $this->findExactPath();
        if ($path === null) {
            $path = $this->findAltModuleName();
        }
        return $path;
    }

    public function getRequestParams()
    {
        return $this->request->getQueryString();
    }

    public function findExactPath()
    {
        foreach ($this->configs->getModuleConfigs() as $config) {
            foreach ($config->module->route as $route) {
                if ($this->request->getRawUrl() === $route->url) {
                    $controller = $route->location;
                    $action = $route->action;
                    return array($controller, $action);
                }
            }
        }
        return null;
    }

    private function findAltModuleName()
    {
        $moduleConfigs = $this->configs->getModuleConfigs();
        $requestUrl = $this->request->getParsedUrl();
        foreach ($moduleConfigs as $config) {
            if (($requestUrl[0] === $config->module->altModName) || ($requestUrl[0] === $config->module->name)) {
                $controller = $config->module->name . '_' . $requestUrl[1] . $config->module->controllersuffix;
                $action = $requestUrl[2];
                return array($controller, $action);
            }
        }
        return null;
    }
}
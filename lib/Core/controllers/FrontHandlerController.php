<?php

class Core_FrontHandlerController
{
    protected $request;

    public function handleRequest($configs)
    {
        $rawUri = $this->currentRequest();
        $splitUri = explode("/", $rawUri);

        $router = new Core_RouterController();
        $router->findRequestPath($splitUri, $configs);
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
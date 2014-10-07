<?php

class Core_App
{
    private $router;
    private $request;
    private $frontController;

    public function Core_App($config)
    {
        $this->request = new Core_Request();
        $this->router = new Core_Router($config, $this->request);
        $route = $this->router->getRequestPath();

        $this->frontController = new Core_FrontController();
        $this->frontController->checkValidRoute($route);
    }

    protected function currentRequest()
    {
        $this->request = $_SERVER[REQUEST_URI];
        return $this->request;
    }
}
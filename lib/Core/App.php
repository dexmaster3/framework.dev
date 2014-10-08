<?php

class Core_App
{
    private $router;
    private $request;
    private $config;
    private $frontController;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function beginRequest()
    {
        $this->request = new Core_Request();
        $this->router = new Core_Router($this->config, $this->request);
        $this->frontController = new Core_FrontController();

        $path = $this->router->getRequestPath();
        $params = $this->router->getRequestParams();

        if($this->frontController->checkValidPath($path)) {
            $this->frontController->launchController($path, $params);
        } else {
            $this->frontController->pathNotFound();
        }
    }
}
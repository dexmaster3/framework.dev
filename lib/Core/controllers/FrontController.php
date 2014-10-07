<?php

class Core_FrontController
{
    protected $request;

    public function checkValidRoute($route)
    {
        try {
            $controller = new $route[0];
            echo $controller->$route[1]();
        }
        catch (Exception $e) {
            throw new Exception("Module/Action not found!");
        }
    }
}
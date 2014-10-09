<?php

class Core_FrontController
{
    public function checkValidPath($path)
    {
        try {
            if (method_exists($path[0], $path[1]) && class_exists($path[0])) {
                $controller = null;
                return true;
            }
        }
        catch (Exception $ex) {
            echo "Module/Action not found!".$ex->getMessage();
            return false;
        }
        return false;
    }
    public function launchController($path, $params)
    {
        $controller = new $path[0]($path, $params);
        $controller->setView() //Load config find appropriate views
        echo $controller->$path[1]($params);
    }
    public function pathNotFound()
    {
        echo "No such path!";
    }
}
<?php

class Lib_Core_RouterController
{
    //This will contain all of the added routes
    protected $routes;

    public function registerRoute($route)
    {
        //add to the routes var
    }

    public function parseRequestPath($requestUri)
    {
        $requestUri = ltrim($requestUri, '/');
        $requestPath = explode('/', $requestUri);

        if (strpos($requestPath[0], 'assets') !== false) {
            return $this->retrieveAsset($requestPath);
        }
        else {
            return $this->retrieveRequest($requestPath);
        }
    }

    protected function retrieveAsset($requestPath)
    {
        $file = array_slice($requestPath, 1);
        $file = implode(DIRECTORY_SEPARATOR, $file);
        return $file;
    }

    protected function retrieveRequest($requestPath)
    {
        if (is_dir('app/' . $requestPath[0])) {
            return $requestPath[1];
        }
        else {
            throw new HttpRequestException;
        }
    }
}
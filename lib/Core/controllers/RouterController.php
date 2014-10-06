<?php

class Core_RouterController
{
    public function findRequestPath($splitUri, $configs)
    {
        foreach($configs as $config) {
            foreach ($config->route as $route)
            if (implode($splitUri) === $route->url) {
                $controller = $route->location;
            }
        }
        return null;
    }
}
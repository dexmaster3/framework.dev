<?php

require "AutoLoader.php";

$autoloadLocations = array(
    'app/pages',
    'lib',
    'lib/core'
);
$newPaths = implode(':', $autoloadLocations);
set_include_path(get_include_path() . PATH_SEPARATOR . $newPaths);

echo get_include_path();

$loader = new AutoLoader();
$loader->setSearch($autoloadLocations);
$loader->setSections($moduleSections);

spl_autoload_register(array($loader, 'loadClass'));

$request_uri = $_SERVER[REQUEST_URI];

function parseUri($request_uri)
{
    //Regex/parsing part
    return $request_uri;
}

function autoloader($class_name)
{
    $loader_roots = array('app', 'lib');

    $loader_modules = array();

    foreach ($loader_roots as $loader_root)
    {
        $modules = glob($loader_root . '/*', GLOB_ONLYDIR);
        array_push($loader_modules, $modules);
    }

    foreach ($loader_modules as $module_path)
    {
        foreach ($module_path as $mvc_folder)
        {
            $mvc_item = glob($mvc_folder . '/*');
            include $mvc_folder . '/' . $class_name . '.php';
        }
    }
}

$test_autoload = new StaticController();

$routertest = new Router();


echo $test_autoload->view("my autolaod page view");

echo $routertest->parseRequestPath($_SERVER[REQUEST_URI]);
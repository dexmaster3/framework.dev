<?php

require_once "autoloader.php";

$loader = new AutoLoader();
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

spl_autoload_register('autoloader');

echo get_include_path();

$test_autoload = new StaticController();
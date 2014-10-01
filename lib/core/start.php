<?php

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
        glob($loader_root . '/*', GLOB_ONLYDIR);
        array_push($loader_modules, $loader_root);
    }

    foreach ($loader_modules as $module_path)
    {
        foreach ($module_path as $mvc_folder)
        {
            include $mvc_folder . $class_name . '.php';
        }
    }
}

spl_autoload_register('autoloader');

$app_path = 'app';
$modules = glob($app_path . '/*');
$test = null;
foreach ($modules as $module_path)
{
    $mvc_items = glob($module_path . '/*');
    foreach ($mvc_items as $mvc_item)
    {
        $test = $mvc_item . 'StaticController' . '.php';
    }
}
include 'test' . '/controllers' . $class_name . '.php';

echo $test;
echo parseUri($request_uri);
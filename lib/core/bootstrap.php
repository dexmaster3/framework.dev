<?php

require "Config.php";
require "AutoLoader.php";

$config = new Configuration();
$loader = new AutoLoader();
$loader->setSearch($config->pathLocations);
spl_autoload_register(array($loader, 'loadClass'));

$frontController = new FrontHandler();
$frontController->parseRequest();


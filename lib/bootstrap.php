<?php

require "Core/controllers/AutoLoaderController.php";
require "Core/controllers/ConfigController.php";

echo phpinfo();
$config = new Core_ConfigController();
$config->pathConfiguration();

$loader = new Core_AutoLoaderController();
spl_autoload_register(array($loader, 'loadClass'));

$frontController = new Core_FrontHandlerController();
$frontController->handleRequest($config->getModuleConfigs());
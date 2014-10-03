<?php

require "Core/controllers/AutoLoaderController.php";

$loader = new Lib_Core_AutoLoaderController();
spl_autoload_register(array($loader, 'loadClass'));

$config = new Lib_Core_ConfigController();
$frontController = new Lib_Core_FrontHandlerController();
$frontController->handleRequest();
<?php

require "Core/Config.php";
require "Core/AutoLoader.php";

$config = new Core_Config();
$loader = new Core_AutoLoader();
spl_autoload_register(array($loader, 'loadClass'));

$app = new Core_App($config);
$app->beginRequest();
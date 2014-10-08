<?php

/**
 * Core Configuration
 * Contains User Defined Paths
 * and other MVC options
 */
class Core_Config
{
    private $moduleConfigs;
    private $coreConfig;
    private $paths;

    public function __construct()
    {
        $this->setCoreConfig();
        $this->setPaths();
        $this->setModuleConfigs();
    }

    public function getCoreConfig()
    {
        return $this->coreConfig;
    }
    public function getModuleConfigs()
    {
        return $this->moduleConfigs;
    }
    public function getPaths()
    {
        return $this->paths;
    }
    private function setCoreConfig()
    {
        $config = file_get_contents(__DIR__."/config.json");
        $this->coreConfig = json_decode($config);
    }
    private function setPaths()
    {
        $newPaths = array();
        foreach ($this->coreConfig->module->paths as $path) {
            array_push($newPaths, getcwd() . DIRECTORY_SEPARATOR . $path);
        }
        $newPaths = implode(':', $newPaths);
        set_include_path(get_include_path() . PATH_SEPARATOR . $newPaths);
        $this->paths = get_include_path();
    }

    private function setModuleConfigs()
    {
        $modules = glob($this->coreConfig->module->modConfigLocation);
        $fullConfig = array();
        foreach($modules as $module) {
            $modContent = file_get_contents($module);
            $modContentDecoded = json_decode($modContent);
            array_push($fullConfig, $modContentDecoded);
        }
        $this->moduleConfigs = $fullConfig;
    }
}
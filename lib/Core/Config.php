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

    public function Core_Config()
    {
        $this->coreConfig = $this->setCoreConfig();
        $this->setPaths();
        $this->moduleConfigs = $this->setModuleConfigs();
    }

    public function getCoreConfig()
    {
        return $this->coreConfig;
    }
    public function getModuleConfigs()
    {
        return $this->moduleConfigs;
    }
    private function setCoreConfig()
    {
        $config = file_get_contents(__DIR__."/config.json");
        $parsedConfig = json_decode($config);
        return $parsedConfig;
    }
    private function setPaths()
    {
        $newPaths = array();
        foreach ($this->coreConfig->module->paths as $path) {
            array_push($newPaths, getcwd() . DIRECTORY_SEPARATOR . $path);
        }
        $newPaths = implode(':', $newPaths);
        set_include_path(get_include_path() . PATH_SEPARATOR . $newPaths);
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
        return $fullConfig;
    }
}
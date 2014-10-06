<?php

/**
 * Class Configuration
 * Contains User Defined Paths
 * and other MVC options
 */
class Core_ConfigController
{
    protected $pathLocations = array(
        'app',
        'lib'
    );
    protected $currentConfigs;

    public function pathConfiguration()
    {
        $newPaths = array();
        foreach ($this->pathLocations as $path) {
            array_push($newPaths, getcwd() . DIRECTORY_SEPARATOR . $path);
        }
        $newPaths = implode(':', $newPaths);
        set_include_path(get_include_path() . PATH_SEPARATOR . $newPaths);
    }

    public function getModuleConfigs()
    {
        $modules = glob('app/*/config.json');
        $fullConfig = '[';
        foreach($modules as $module) {
            $fullConfig .= file_get_contents($module);
        }
        $fullConfig .= ']';
        $jsonConfig = json_decode($fullConfig);
        $this->currentConfigs = $jsonConfig;
        return $jsonConfig;
    }
}
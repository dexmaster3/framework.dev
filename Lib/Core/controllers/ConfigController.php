<?php

/**
 * Class Configuration
 * Contains User Defined Paths
 * and other MVC options
 */
class Lib_Core_ConfigController
{
    public $pathLocations = array(
        'app/pages',
        'Lib',
        'Lib/Core'
    );

    public function Configuration()
    {
        $newPaths = $this->pathLocations;
        $newPaths = implode(':', $newPaths);
        set_include_path(get_include_path() . PATH_SEPARATOR . $newPaths);
    }
}
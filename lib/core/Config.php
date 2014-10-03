<?php

/**
 * Class Configuration
 * Contains User Defined Paths
 * and other MVC options
 */
class Configuration
{
    public $pathLocations = array(
        'app/pages',
        'lib',
        'lib/core'
    );

    public function Configuration()
    {
        $newPaths = $this->pathLocations;
        $newPaths = implode(':', $newPaths);
        set_include_path(get_include_path() . PATH_SEPARATOR . $newPaths);
    }
}
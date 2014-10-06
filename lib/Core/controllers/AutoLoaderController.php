<?php

class Core_AutoLoaderController
{
    const EXTENSION = '.php';
    private $searchLocations;

    /**
     * @param array $searchLocations Contains path locations for autoloading
     */
    public function setSearch($searchLocations)
    {
        $this->searchLocations = $searchLocations;
    }

    public function getSearch()
    {
        return $this->searchLocations;
    }

    /**
     * Function used by the php spl_autoloader
     * @param object $className Class name to be auto-loaded
     */
    public function loadClass($className)
    {
        $className = ltrim($className, '\\');
        $directory = explode('_', $className);
        $mvcType = null;
        $paths = explode(':', get_include_path());
        foreach ($directory as $location) {
            if (stripos($location, 'controller')) {
                $mvcType = 'controllers';
                break;
            } elseif (stripos($location, 'model')) {
                $mvcType = 'models';
                break;
            } elseif (stripos($location, 'view')) {
                $mvcType = 'views';
                break;
            }
        }
        if ($mvcType !== null) {
            array_splice($directory, -1, 0, $mvcType);
        }
        foreach ($paths as $path) {
            $file = $path . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $directory) . self::EXTENSION;
            if (is_file($file)) {
                require $file;
            }
        }
    }
}
<?php

class AutoLoader
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
        $classType = $this->detectClassType($className);
        foreach ($this->searchLocations as $searchLocation) {
            $file = $searchLocation . DIRECTORY_SEPARATOR . $classType . $className . self::EXTENSION;
            if (is_file($file)) {
                require $file;
                break;
            }
        }
    }

    protected function detectClassType($className)
    {
        $types = array(
            'controller' => 'controllers',
            'model' => 'models',
            'view' => 'views'
        );

        foreach ($types as $type_k => $type_v) {
            if (strpos(strtolower($className), $type_k)) {
                return $type_v . DIRECTORY_SEPARATOR;
            }
        }
        return null;
    }
}
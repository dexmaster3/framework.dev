<?php

class AutoLoader
{
    const EXTENSION = '.php';
    private $include_path;
    private $searchLocations;
    private $moduleSections;

    public function setSections($moduleSections)
    {
        $this->moduleSections = $moduleSections;
    }
    public function getSections()
    {
        return $this->$moduleSections;
    }
    public function setSearch($searchLocations)
    {
        $this->searchLocations = $searchLocations;
    }
    public function getSearch()
    {
        return $this->searchLocations;
    }

    public function loadClass($className)
    {
        $classType = $this->detectClassType($className);

        if ($classType === null) {
            $file = $classType . DIRECTORY_SEPARATOR . $location;
            if (is_file($file)) {
                require $file;
            }
        }
        else {
            foreach ($this->moduleSections as $moduleLocation) {
                $file = $classType . DIRECTORY_SEPARATOR . $location;
                if (is_file($file)) {
                    require $file;
                }
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
                return $type_v;
            }
        }
    }
}
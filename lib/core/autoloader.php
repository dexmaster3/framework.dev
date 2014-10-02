<?php

class AutoLoader
{
    private $extention = '.php';
    private $separator = '\\';
    private $include_path;
    private $namespace;

    public function setNamespace($namespace)
    {
        $this->$namespace = $namespace;
    }
    public function getNamespace($namespace)
    {
        return $this->$namespace;
    }

    public function loadClass($class_name)
    {

        $class_name = ltrim($class_name, '\\');
        if ($this->$namespace === null){
            $file_name = '';
        }
    }
}
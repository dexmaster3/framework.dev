<?php

//Will be the base class for all user defined models in modules
abstract class Core_Model
{
    protected $model;

    function getModel()
    {
        return $this->model;
    }
}
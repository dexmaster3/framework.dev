<?php

class StaticModel
{
    public $static = "this is my static model information";

    public function getInfo()
    {
        return $this->static;
    }
}
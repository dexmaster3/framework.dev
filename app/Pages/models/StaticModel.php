<?php

class Pages_StaticModel
{
    public $static = "this is my static model information";

    public function getModel()
    {
        return array($this->static);
    }
}
<?php

class Pages_StaticController extends Core_BaseController
{
    public function index($params = array())
    {
        return $this->make('HomePages_Home', $params);
    }
    public function mypage($params = array())
    {
        return $this->make('userpages_main', $params);
    }
}
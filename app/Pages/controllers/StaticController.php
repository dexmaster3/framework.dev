<?php

class Pages_StaticController extends Core_BaseController
{
    public function index($params = array())
    {
        //Normal
        $this->getResponse()->setBody($this->bootStrapLayout());
    }
    public function mypage($params = array())
    {
        //Convert Pages_StaticController::mypage into pages_static_mypage
        return $this->make('userpages_main', $params);
    }
    public function noparams()
    {
        //Convert Pages_StaticController::noparams into pages_static_noparams
        return $this->make('HomePages_Home');
    }
}
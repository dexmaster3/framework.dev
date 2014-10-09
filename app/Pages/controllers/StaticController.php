<?php

class Pages_StaticController extends Core_BaseController
{
    public function index($params = array())
    {
        $mymodel = new Pages_StaticModel();
        $info = $mymodel->getModel();
        return $this->make('HomePages_Home', $params, $info);
    }
    public function mypage($params = array())
    {
        return $this->make('userpages_main', $params);
    }
    public function noparams()
    {
        return $this->make('HomePages_Home');
    }
}
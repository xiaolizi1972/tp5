<?php
namespace app\admin\controller;

use app\admin\controller\Base;
use think\Session;

class Index extends Base
{


    //首页
    public function index()
    {
        //pr($this->menuList());
         return view('index',['menu_list'=>$this->menuList()]);
    }


    //欢迎页
    public function  welcome()
    {

        return view();
    }



}

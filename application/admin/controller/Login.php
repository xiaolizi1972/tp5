<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use app\admin\logic\LoginLogic;
use app\common\model\Admin;

class Login extends Controller
{


    protected $login;
    
    public function __construct(LoginLogic $login)
    {
        $this->login = $login;
    }


    //登录页
    public function index()
    {
       
        return view();
    }


    //登录操作
    public function login()
    {
        return $this->login->login(input('post.'));
    }


    //退出登录
    public function logout()
    {
        Session::clear();
        $this->redirect('Login/index');
    }

}

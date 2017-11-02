<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use app\admin\logic\AdminLogic;

class Base extends Controller
{


     public function __construct()
    {
       
        parent::__construct();
        $this->loginCheck();
        $this->isAccredit();
       
    }


    //登录验证
    public  function  loginCheck()
    {
        //当前登录用户信息
        if(!Session::has('admin_user')) {
            $this->redirect('login/index');
        }

        $this->assign('admin_user',Session::get('admin_user'));

    }

    //菜单列表
    public function  menuList()
    {

       $menu  =  Model('Menu')->where('status',1)->select()->toArray();
       $rules = AdminLogic::getRule(Session::get('admin_user.admin_id'));

       $data = [];
       foreach ($menu as $key => $val) {

            if($val['pid'] ==0){
                if(in_array($val['url'], $rules)){
                     $data[$key] = $val;
                }
            }

            foreach ($menu as $k => $v) {
                if($val['id'] == $v['pid']){

                    if(in_array($v['url'], $rules)){
                        $data[$key]['child'][] =  $v;
                    }
                }
            }


       }
       
       return  $data;
    }



    public  function  isAccredit()
    {

            $request = Request::instance();
            $url     =  strtolower($request->module().'/'.$request->controller().'/'.$request->action());

            $rules = AdminLogic::getRule(Session::get('admin_user.admin_id'));

            if($request->controller()!= 'Index'){
               
                 if(!in_array($url, $rules)){
                    if( Request::instance()->isAjax() )
                        $this->json(403,'您没有权限');
                    else{
                        $this->error('您没有权限');
                    }
                }        
            }
           
    }



}

<?php
namespace app\admin\logic;

use think\Model;
use think\Session;
use app\common\Model\Admin;
use think\Cache;


Class  LoginLogic  extends Model {


    /** 
     * 登录逻辑处理
     *
     * @param  array  $post 表单数据
     */
    public  function login($post)
    {

        if(!$this::isLock($post['user_name'])){
            return  api(500,'登录失败次数过多账号已被禁用');
        }

        $admin  =  Admin::get(['user_name'=>$post['user_name']]);
         //  pr($admin);
        if(!$admin || $admin->getData('status') == 0){
            return  api(500,'账户不存在或被禁用');
        }

        if(!$this->checkPassword($post['password'],$admin['password'])){
            return  api(500,'账号或密码错误',Cache::get('defeate_time'));
        }

            Cache::rm('defeate_time');
            Session::set('admin_user',$admin);
            return  api(200,'登录成功');
    }

    //登录验证
    public function checkPassword($password,$hash)
    {

        if (password_verify($password, $hash)) {
            return true;
        }
        return false;
    }


    //账号是否锁定
    public  function isLock ($user_name)
    {

        if(Cache::get('defeate_time') > 5){
           admin::where('user_name',$user_name)->update(['status'=>0]);
            return false;
        }
        return true;
    }




}







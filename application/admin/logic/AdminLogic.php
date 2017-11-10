<?php
namespace app\admin\logic;

use think\Controller;
use app\common\model\Admin;
use app\admin\logic\BaseLogic;


Class  AdminLogic extends   BaseLogic{


    protected  $model;

    public function  _initialize()
    {

        $this->model  = new admin;

    }

                    

    //获取管理员列表
    public function getList()
    {

        return Admin::paginate(15);
    }


    //添加数据
    public function  create($post)
    {
        $admin =  new Admin;

        $admin->user_name =  $post['user_name'];
        $admin->password  =  password_hash($post['password'], PASSWORD_DEFAULT);
        $admin->phone     =  $post['phone'];
        $admin->role_id   =  $post['role_id'];
        $admin->status    =  isset($post['status'])?1:0;

        if($admin->save()) {

            return api(200,'添加成功');
        }
            return api(500,'添加失败');

    }



    //保存修改数据
    public  function  update($post)
    {

        $admin  =  Admin::get($post['admin_id']);

        $admin->user_name =  $post['user_name'];
        $admin->phone     =  $post['phone'];
        $admin->role_id   =  $post['role_id'];
        $admin->status    =  isset($post['status'])?1:0;

        if($admin->save()) {

            return api(200,'修改成功');
        }
            return api(500,'修改失败');

    }


    //修改密码
    public function  savePassword($post)
    {

        $admin   =    Admin::get($post['admin_id']);  

        if($post['password'] !=  $post['old']) {

            return api(500,'两次密码不一致');
        }   

        $admin->password =  password_hash($post['password'], PASSWORD_DEFAULT);
        if(!$admin->save()) {
            return api(500,'修改失败');
        }

            return  api(200,'修改成功');

    }





    public static function getRule($admin_id)
    {
  
        $admin =   Admin::get($admin_id);
        $rule_id =  Model('Role')->where('role_id',$admin->role_id)->value('rule_id');
        return  Model('Rule')->whereIn('id',$rule_id)->column('url');

    }



}
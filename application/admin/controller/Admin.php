<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\controller\Base;
use app\admin\logic\AdminLogic;
use app\admin\logic\RoleLogic;


class Admin extends Base
{

    protected $admin;

    public function __construct(AdminLogic $admin)
    {
        parent::__construct();
        $this->admin = $admin;
    }


    //管理员列表
    public function index()
    {
        $admins =  $this->admin->getList();
        return view('index',['admins'=>$admins]);
    }



    //添加页
    public function create()
    {
        $roles =  RoleLogic::roles();
        return view('create',['roles'=>$roles]);
    }


    //保存数据
    public function save()
    {
        return $this->admin->create(input('post.'));
    }



    //编辑页
    public function edit($id)
    {

        $admin   =   $this->admin->getInfo($id);
        $roles   =   RoleLogic::roles();
        $this->assign('status', $admin->getData('status'));
        return view('edit',['admin'=>$admin,'roles'=>$roles]);
    }



    //修改数据
    public function update()
    {
        return  $this->admin->update(input('post.'));
    }

    // 删除
    public function delete($id)
    {
       return  $this->admin->delete($id);
    }



    //详情页
    public function read($id)
    {

        $admin =  $this->admin->getInfo($id);
        return view('read',['admin'=>$admin]);

    }



    // 删除
    public function status()
    {
        return  $this->admin->status();
    }

}

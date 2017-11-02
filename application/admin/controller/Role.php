<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\controller\Base;
use app\admin\logic\RoleLogic;
use app\admin\logic\RuleLogic;


/**
 * author:xiaolizi
 *
 * explain :角色管理
 * date:2017-9-27
 * email : 2860265796@qq.com
 */


class Role extends Base
{

    protected $role;

    public function __construct(RoleLogic $role)
    {
        parent::__construct();
        $this->role = $role ;
    }


    //管理组
    public function index()
    {
        $roles   =   $this->role->getList();
        return view('index',['roles'=>$roles]);
    }




    //添加页
    public function create()
    {
        $rules = RuleLogic::rules();
        return view('create',['rules'=>$rules]);
    }




    //保存数据
    public function save()
    {
       return  $this->role->create(input('post.'));
    }



    //编辑页
    public function edit($id)
    {
        $rules = RuleLogic::rules();
        $role  =  $this->role->getInfo($id);

        return view('edit',['rules'=>$rules,'role'=>$role]);
    }



    //保存修改数据
    public function update()
    {
        return $this->role->update(input('post.'));
    }


    //删除
    public function delete($id)
    {
        return $this->role->delete($id);
    }


    //修改状态
    public function  status ()
    {

        return $this->role->status();
    }
}

<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\logic\SystemLogic;

class System extends Controller
{
    protected $system;

    public function  __construct(SystemLogic $system)
    {
         parent::__construct();
         $this->system  =  $system;
    }


    //数据列表
    public function index()
    {
        $systems   =  $this->system->getList();
        return view('index',['systems'=>$systems]);
    }



    //添加页
    public function create()
    {
        return view();
    }



    //保存数据
    public function save()
    {
        return $this->system->create(input('post.'));
    }

   
    //编辑页
    public function edit($id)
    {
       $system =  $this->system->getInfo($id);
       $this->assign('status',$system->getData('status'));
       return  view('edit',['system'=>$system]);
    }


    //修改数据
    public function update()
    {
        return $this->system->update(input('post.'));
    }


    //删除数据
    public function delete($id)
    {
        
    }


     //修改状态
    public function status($id)
    {
        
    }
}

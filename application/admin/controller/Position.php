<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\logic\PositionLogic;

class Position extends Controller
{

    protected  $position;

    public function  __construct(PositionLogic $position)
    {
        parent::__construct();

        $this->position  =  $position;
    }


    //数据列表
    public function index()
    {
        $positions   =    $this->position->getList();
        return view('index',['positions'=>$positions]);
    }



    //添加页
    public function create()
    {

        return view();
    }



    //保存数据
    public function save()
    {
        return  $this->position->create(input('post.'));
    }

   
    //编辑页
    public function edit($id)
    {
       
       return  view('edit');
    }


    //修改数据
    public function update()
    {
        
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

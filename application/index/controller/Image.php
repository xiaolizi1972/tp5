<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Image extends Controller
{


    public function  __construct()
    {


    }


    //数据列表
    public function index()
    {
        return view();
    }



    //添加页
    public function create()
    {
        return view();
    }



    //保存数据
    public function save()
    {
        
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

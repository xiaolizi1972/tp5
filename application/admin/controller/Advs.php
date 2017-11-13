<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\logic\AdvsLogic;

class Advs extends Controller
{

    protected $advs;

    public function  __construct(AdvsLogic $advs)
    {
        parent::__construct();
        $this->advs   =  $advs;
    }


    //数据列表
    public function index()
    {
        $advs =  $this->advs->getList();
        return view('index',['advs'=>$advs]);
    }



    //添加页
    public function create()
    {
        return view();
    }



    //保存数据
    public function save()
    {
        return $this->advs->create(input('post.'));
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

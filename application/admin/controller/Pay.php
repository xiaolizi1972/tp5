<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\logic\PayLogic;

class Pay extends Controller
{

    protected $pay;

    public function  __construct(PayLogic $pay)
    {
        parent::__construct();
        $this->pay  =  $pay;

    }


    //数据列表
    public function index()
    {
        $pays   =  $this->pay->getList();
        return view('index',['pays'=>$pays]);
    }



    //添加页
    public function create()
    {
        return view();
    }

    //保存数据
    public function save()
    {
        return $this->pay->create(input('post.'));
    }

   
    //编辑页
    public function edit($id)
    {

        $pay =  $this->pay->getInfo($id); 
        $pay->thumb_img  =  $pay->getCover->thumb_img; 
        $this->assign('status', $pay->getData('status'));

        return  view('edit',['pay'=>$pay]);
    }


    //修改数据
    public function update()
    {
        return $this->pay->update(input('post.'));
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

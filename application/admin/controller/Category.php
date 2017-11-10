<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\logic\CategoryLogic;


/**
 * explain:分类管理
 * author :xiaolizi
 *
 * date :2017-11-10
 */



class Category extends Controller
{



    protected $category;

    public function  __construct(CategoryLogic $category)
    {
        parent::__construct();
        $this->category =  $category;
    }


    //数据列表
    public function index()
    {

        $categorys  =  $this->category->getByList();
        return view('index',['categorys'=>$categorys]);
    }



    //添加页
    public function create()
    {
        $categorys =  $this->category->getByList();
        return view('create',['categorys'=>$categorys]);
    }



    //保存数据
    public function save()
    {
       return  $this->category->create(input('post.'));
    }

   
    //编辑页
    public function edit($id)
    {

       $category   =   $this->category->getInfo($id);
       $categorys  =   $this->category->getByList();

       $this->assign('status',$category->getData('status'));
       return  view('edit',['category'=>$category,'categorys'=>$categorys]);
    }


    //修改数据
    public function update()
    {
        return  $this->category->update(input('post.'));
    }


    //删除数据
    public function delete($id)
    {
        return $this->category->delete($id);
    }


     //修改状态
    public function status($id)
    {
        return  $this->category->status($id);
    }
}

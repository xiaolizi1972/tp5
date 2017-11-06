<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\logic\CategoryLogic;

class Category extends Controller
{


    
    protected $category;

    public function __construct(CategoryLogic $category)
    {
        parent::__construct();
        $this->category  =  $category;
    }

    //分类列表
    public function index()
    {
        $categorys =  $this->cateogry->getList();
        return  view('index',['categorys'=>$categorys]);
    }


    //添加页
    public function create()
    {
        return  view();
    }



    //保存数据
    public function save(Request $request)
    {
        return $this->category();
    }


    //编辑页
    public function edit($id)
    {
        $category =   $this->category->getInfo($id);
        return  view('edit',['category'=>$category]);
    }



    //修改数据
    public function update()
    {
        return $this->category->update(input('post.'));
    }



    //删除数据
    public function delete($id)
    {
        return  $this->category->delete($id);
    }



    //状态
    public function status()
    {
        return $this->category->status();
    }

}

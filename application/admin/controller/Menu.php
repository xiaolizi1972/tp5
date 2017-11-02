<?php
namespace app\admin\controller;

use think\Request;
use app\admin\logic\MenuLogic;


class Menu extends Base
{

    protected $menu;
    
    public function __construct(MenuLogic $menu)
    {
        parent::__construct();
        
        $this->menu = $menu;

    }


    // 菜单列表
    public function index()
    {
        $menus =  $this->menu->getList();
        return view('index',['menus'=>$menus]);
    }


    //添加菜单
    public function create()
    {
        $menus =   $this->menu->getByList();
        return view('create',['menus'=>$menus]);
    }


    //保存菜单
    public function save()
    {   
        return $this->menu->create(input('post.'));
    }


    //编辑菜单
    public function edit($id)
    {
        $menus  =   $this->menu->getByList();
        $menu   =   $this->menu->getInfo($id);
        $status =   $menu->getData('status');
        return view('edit',['menu'=>$menu,'menus'=>$menus,'status'=>$status]);
    }


    //修改菜单
    public function update()
    {
        return $this->menu->update(input('post.'));
    }


    //删除
    public function delete($id)
    {
        return $this->menu->delete($id);
    }


    //修改状态
    public  function  status()
    {
        return  $this->menu->status();
    }


}

<?php
namespace app\admin\logic;

use think\Controller;
use app\common\Model\Menu;



Class  MenuLogic  extends Controller {

    

    //获取列表
    public  function  getList($data=[],$pid=0,$nbsp=0)
    {

        $list  =  Menu::where('pid',$pid)->select(); 
        $nbsp+=2;
        if($list){

             foreach ($list as $val) {
                $val['name'] =  str_repeat('&emsp;',$nbsp).'|--'.$val['name'];
                $data [] = $val;
                $data =  $this->getList($data,$val['id'],$nbsp);
             }
        }
      
        return $data;
    }


    //获取列表
    public  function getByList(){

        return  Menu::where('pid',0)->select();

    }



    //添加数据
    public function  create($post)
    {

        $menu =  new Menu;

        $menu->name =  $post['name'];
        $menu->url  =  $post['url'];
        $menu->pid  =  $post['pid'];
        $menu->icon =  $post['icon'];
        $menu->status =  isset($post['status'])?1:0;

        if($menu->save()){
            return api(200,'添加成功');
        }
        return api(500,'添加失败');

    }

    //修改数据
    public function  update($post)
    {

        $menu  =  Menu::get($post['id']);

        $menu->name =  $post['name'];
        $menu->url  =  $post['url'];
        $menu->pid  =  $post['pid'];
        $menu->icon =  $post['icon'];
        $menu->status =  isset($post['status'])?1:0;

         if($menu->save()){
            return api(200,'修改成功');
        }
        return api(500,'修改失败');
    }


    //获取详情
    public function   getInfo($id)
    {

        return Menu::get($id);
    }

    public function  status()
    {

       $id     =  input('param.id');
       $status =  input('param.status');
       if(Menu::where('id', $id)->update(['status' => $status])) {
            return api(200,'操作成功');
       }

       return api(500,'操作失败');

    }


    public function  delete($id)
    {

        if(Menu::destroy($id)){
            return api(200,'删除成功');
        }

        return api('500','删除失败');

    }


}







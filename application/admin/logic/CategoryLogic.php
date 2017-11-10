<?php
namespace app\admin\logic;

use think\Controller;
use app\common\model\Category;
use app\admin\logic\BaseLogic;

class CategoryLogic extends BaseLogic
{
    
    protected  $model;

    public function  _initialize()
    {

        $this->model  = new Category;

    }


    /**
     * 创建数据
     *
     * @param  array  $post 表单数据
     */
   public  function  create($post)
    {

            $category     =   new  Category();

            $category->name  =  $post['name'];
            $category->title =  $post['title'];
            $category->sort  =  $post['sort'];
            $category->description =  $post['description'];
            $category->keywords    =  $post['keywords'];
            $category->pid   =  $post['pid'];
            $category->status =  isset($post['status'])?'1':0;

            // pr($category);

            if($category->save()){

                return api(200,'操作成功');

            }

            return api(500,'操作失败');


    }



    /**
     * 修改数据
     * @param  array $post 表单数
     */

    public function  update($post)
    {

            $category      =   Category::get($post['id']);

            $category->name  =  $post['name'];
            $category->title =  $post['title'];
            $category->sort  =  $post['sort'];
            $category->description =  $post['description'];
            $category->keywords    =  $post['keywords'];
            $category->pid   =  $post['pid'];
            $category->status =  isset($post['status'])?'1':0;

            if($category->save()){

                return api(200,'操作成功');

            }

            return api(500,'操作失败');


    }


    //获取无级分类
    public  function  getByList($data=[],$pid=0,$nbsp=0)
    {

        $list  =  Category::where('pid',$pid)->select(); 
        $nbsp+=2;
        if($list){

             foreach ($list as $val) {
                $val['title'] =  str_repeat('&emsp;',$nbsp).'|--'.$val['title'];
                $data [] = $val;
                $data =  $this->getByList($data,$val['id'],$nbsp);
             }
        }
      
        return $data;
    }



  
    
}   

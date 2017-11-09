<?php
namespace app\admin\logic;

use think\Controller;
use app\common\model\System;


class SystemLogic extends Controller
{
    

    //获取列表
    public  function getList()
    {

       return   System::paginate();
    }


   /**
    * 返回详情
    * @param integer  $id  数据id
    */
    public  function  getInfo($id)
    {

        return  System::get($id);

    }



    /**
     * 创建数据
     *
     * @param  array  $post 表单数据
     */
    public  function  create($post)
    {

        $system  =  new System();

        $system->name  =  $post['name'];
        $system->value  =  $post['value'];
        $system->desc  =  $post['desc'];
        $system->status =  isset($post['status'])?'1':'0'; 

        if($system->save()){
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

        $system  =  System::get($post['id']);

        $system->name =  $post['name'];
        $system->value =  $post['value'];
        $system->desc =  $post['desc'];
        $system->status =  isset($post['status'])?'1':'0'; 

        if($system->save()){
            return api(200,'操作成功');
        }

        return api(500,'操作失败');
    }


    /**
     * 删除数据
     *
     * @param  integer $id 数据id
     */
    public  function  delete($id)
    {


    }


    /**
     * 修改状态
     * @param  integer  $id  数据id
     */

    public   function  status ()
    {
        

    }





    
}   

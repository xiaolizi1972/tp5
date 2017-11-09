<?php
namespace app\admin\logic;

use think\Controller;
use app\common\model\Pay;

class PayLogic extends Controller
{
    

    //获取列表
    public  function getList()
    {
        return  Pay::paginate();

    }


   /**
    * 返回详情
    * @param integer  $id  数据id
    */
    public  function  getInfo($id)
    {

       return  Pay::get($id);

    }


    /**
     * 创建数据
     *
     * @param  array  $post 表单数据
     */
    public  function  create($post)
    {

        $pay             =    new Pay();

        $pay->name       =    $post['name'];
        $pay->title      =    $post['title'];
        $pay->key        =    $post['key'];
        $pay->app_id     =    $post['app_id'];
        $pay->return_url =    $post['return_url'];
        $pay->cover_id   =    $post['cover_id'];
        $pay->status     =    isset($post['status']);

        if($pay->save()){
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

        $pay             =    Pay::get($post['id']);

        $pay->name       =    $post['name'];
        $pay->title      =    $post['title'];
        $pay->key        =    $post['key'];
        $pay->app_id     =    $post['app_id'];
        $pay->return_url =    $post['return_url'];
        $pay->cover_id   =    $post['cover_id'];
        $pay->status     =    isset($post['status']);

        if($pay->save()){
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

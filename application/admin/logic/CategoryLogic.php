<?php
namespace app\admin\logic;

use think\Controller;
use app\common\model\Category;

class CategoryLogic extends Controller
{
    

    //获取列表
    public  function getList()
    {

        return  Category::paginate();
    }


   /**
    * 返回详情
    * @param integer  $id  数据id
    */
    public  function  getInfo($id)
    {



    }



    /**
     * 创建数据
     *
     * @param  array  $post 表单数据
     */
    public  function  create()
    {




    }



    /**
     * 修改数据
     * @param  array $post 表单数
     */

    public function  update()
    {




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

<?php
namespace app\admin\logic;

use think\Controller;
use app\admin\logic\BaseLogic;
use app\common\model\Position;

class PositionLogic extends BaseLogic
{
    protected  $model;

    public function _initialize()
    {
        $this->model =  new Position;
    }
    

    /**
     * 创建数据
     *
     * @param  array  $post 表单数据
     */
    public  function  create($post)
    {

            $position   =   new Position;

            $position->name =  $post['name'];
            $position->desc =  $post['desc'];
            $position->status  =  isset($post['status'])?'1':'0';

            if($position->save()){
                return api(200,'操作成功');

            }

            return  api(500,'操作失败');



    }



    /**
     * 修改数据
     * @param  array $post 表单数
     */

    public function  update($post)
    {

           $position =  Position::get($post['id']);


           $position->name =  $post['name'];
           $position->desc =  $post['desc'];
           $position->status  =  isset($post['status'])?'1':'0';

            if($position->save()){
                return api(200,'操作成功');

            }

            return  api(500,'操作失败');

    }


   

    
}   

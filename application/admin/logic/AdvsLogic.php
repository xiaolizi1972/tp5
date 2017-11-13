<?php
namespace app\admin\logic;

use think\Controller;
use app\admin\logic\BaseLogic;
use app\common\model\Advs;

class AdvsLogic extends BaseLogic
{
    
    protected  $model;

    public function _initialize()
    {
        $this->model =  new  Advs;
    }
    

   
    /**
     * 创建数据
     *
     * @param  array  $post 表单数据
     */
    public  function  create($post)
    {

         $advs  =   new Advs;

         $advs->title    =  $post['title'];
         $advs->position =  $post['position'];
         $advs->text     =  $post['text'];
         $advs->advspic  =  $post['advspic'];
         $advs->sort     =  $post['sort'];
         $advs->status   =  isset($post['status'])?'1':'0';


         if($advs->save()){
            return  api(200,'操作成功');
         }

         return api(500,'操作失败');

    }



    /**
     * 修改数据
     * @param  array $post 表单数
     */

    public function  update($post)
    {

         $advs  =  Advs::get($psot['id']);

         $advs->title    =  $post['title'];
         $advs->position =  $post['position'];
         $advs->text     =  $post['text'];
         $advs->advspic  =  $post['advspic'];
         $advs->sort     =  $post['sort'];
         $advs->status   =  isset($post['status'])?'1':'0';


         if($advs->save()){
            return  api(200,'操作成功');
         }

         return api(500,'操作失败');

    }




    
}   

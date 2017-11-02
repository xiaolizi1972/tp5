<?php
namespace app\admin\logic;

use think\Controller;


Class  BaseLogic extends Controller{


    //查询列表
   /* public function  getList()
    {
       
        return $this->model->select();

    }*/

    //获取单条数据
    public function  getInfo($id)
    {
        return $this->model->get($id);
    }


    /**
     * @return mixed
     */
   


}
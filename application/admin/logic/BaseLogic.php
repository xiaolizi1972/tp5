<?php
namespace app\admin\logic;

use think\Controller;


Class  BaseLogic extends Controller{


    //查询列表
    public function  getList()
    {
       
        return $this->model->paginate();

    }

    //获取单条数据
    public function  getInfo($id)
    {
        return $this->model->get($id);
    }


    //修改状态
    public function  status()
    {
       $id      =   input('param.id');
       $status  =   input('param.status');
       $model   =   $this->model->get($id);

       $model->status  = $status;
       if($model->save()) {

            return api(200,'操作成功');
       }

       return api(500,'操作失败');

    }



    //删除数据
    public function  delete($id)
    {

        if($this->model->destroy($id)){
            return api(200,'删除成功');
        }

        return api('500','删除失败');

    }



}
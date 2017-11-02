<?php
namespace  app\admin\logic;

use think\Controller;
use app\common\model\Role;

Class  RoleLogic  extends  Controller {


    //获取列表
    public    function  getList()
    {

        return   Role::paginate(15);
    }



    //列表
    public  static function  roles()
    {

        return  Role::where('status',1)->select();
    }

    //获取详情
    public  function getInfo($id)
    {

        $role  =    Role::get($id);
        $role->rule_id =  explode(',',$role->rule_id);
        return $role ;
    }


    //添加数据
    public  function   create ($post)
    {

        $role   =  new  Role;

        $role->name     =   $post['name'];
        $role->rule_id  =   implode(',',$post['rule_id']);

        if($role->save()) {
            return  api(200,'添加成功');
        }

            return  api (500,'添加失败');

    }



    //修改数据
    public  function   update($post)
    {

        $role   =  Role::get($post['role_id']);
        $role->name     =  $post['name'];
        $role->rule_id  =   implode(',',$post['rule_id']);

        if($role->save()){
            return api(200,'修改成功');
        }

            return api(500,'修改失败');

    } 


    //修改状态
     public function  status()
    {

       $id     =  input('param.id');
       $status =  input('param.status');
       if(Role::where('role_id', $id)->update(['status' => $status])) {
            return api(200,'操作成功');
       }

       return api(500,'操作失败');

    }


    //删除数据
    public function  delete($id)
    {

        if(Role::destroy($id)){
            return api(200,'删除成功');
        }

        return api('500','删除失败');

    }




}




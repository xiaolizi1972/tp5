<?php
namespace  app\admin\logic;

use think\Controller;
use app\common\model\Rule;

Class  RuleLogic  extends  Controller {


    //获取列表
    public  function  getList($data=[],$pid=0,$nbsp=0)
    {

        $list  =  Rule::where('pid',$pid)->select(); 
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

    //获取详情
    public  function getInfo($id)
    {

        return   Rule::get($id);

    }


    //添加数据
    public  function   create ($post)
    {
        $id = input('post.id','0');
        if($id > 0){

            $Rule   =  Rule::get($post['id']);

            $Rule->name     =  $post['name'];
            $Rule->url  =  $post['url'];

             if($Rule->save()) {
                return  api(200,'修改成功');
            }
                return  api(500,'修改失败');

        }else{
            $Rule   =  new  Rule;

            $Rule->name =   $post['name'];
            $Rule->url  =   $post['url'];
            $Rule->pid  =  $post['pid'];

            if($Rule->save()) {
                return  api(200,'添加成功');
            }
                return  api(500,'添加失败');
        }
    }



    //修改状态
     public function  status()
    {

       $id     =  input('param.id');
       $status =  input('param.status');
       if(Rule::where('id', $id)->update(['status' => $status])) {
            return api(200,'操作成功');
       }

       return api(500,'操作失败');

    }


    //删除数据
    public function  delete($id)
    {

        if(Rule::destroy($id)){
            return api(200,'删除成功');
        }

        return api('500','删除失败');

    }



    public static function  rules()
    {

           $menu =  Rule::where('status',1)->select()->toArray();
           $data = [];
           foreach ($menu as $key => $val) {
                if($val['pid'] == 0){
                    $data[$key] = $val;
                }
                foreach ($menu as $k => $v) {
                    if($v['pid'] ==  $val['id']){
                        $data[$key]['child'][] =  $v;
                    }
                }
           }
           return  $data;
    }


}




<?php
namespace app\admin\controller;

use think\Request;
use app\admin\controller\Base;
use app\admin\logic\RuleLogic;


/**
 * author:xiaolizi
 *
 * explain :权限管理
 * date:2017-9-27
 * email : 2860265796@qq.com
 */


class Rule extends Base
{

    protected $rule;

    public function __construct(RuleLogic $rule)
    {
        parent::__construct();
        $this->rule = $rule ;
    }


    //权限列表
    public function index()
    {
        $rules =  $this->rule->getList();
        return view('index',['rules'=>$rules]);
    }


   

    //保存数据
    public function save(Request $request)
    {   
        return $this->rule->create(input('post.'));
        
    }




    //编辑数据
    public function edit($id)
    {
        $rule =  $this->rule->getInfo($id);
        return api(200,'ok',$rule);

    }





    //删除数据
    public function delete($id)
    {
       return  $this->rule->delete($id);
    }


    //修改状态
    public function status()
    {

        return $this->rule->status();
    }


}

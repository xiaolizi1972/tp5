<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use app\common\model\User as UserModel;

class User extends Controller
{
	
	protected $user;
	public function __construct(UserModel $user)
    {
    	$this->user = $user;
    }

	
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $user =  UserModel::get('1');
        $user->dd = "<span>等到</span>";
        echo $user->dd;
        echo $user->status;
   
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        pr(UserModel::scope('小李')->find());
      // pr($this->user->all());
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}

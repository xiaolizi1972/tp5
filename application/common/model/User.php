<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class User extends Model
{
	use SoftDelete;
    protected $autoWriteTimestamp = true;

    protected $deleteTime = 'delete_time';
	protected $pk = 'user_id';
	protected $table = 'tp_users';
	protected $readonly = ['email'];  //允许只读的字段
	
	
	//获取器
	public function getStatusAttr($value)
    {
        $status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
        return $status[$value];
    }


    //魔化查询方法
    public function scopeUserName($query, $user_name)
    {
        $query->where('user_name', 'like', '%' . $user_name . '%');
    }
    
	
	
}

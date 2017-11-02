<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class Role extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $autoWriteTimestamp = true;
    protected $pk =  'role_id';



    public function getStatusAttr($value)
    {
        $status = [
            1=>'<a onclick="status('.$this->role_id.',0)">
                   <i class="fa fa-check text-navy"></i>启用
                </a>',
            0=>'<a onclick="status('.$this->role_id.',1)">
                    <i class="fa fa-close text-danger"></i>禁用
                </a>'
        ];
        return $status[$value];
    }




}

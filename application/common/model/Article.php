<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;


class Article extends Model
{
     use SoftDelete;
     protected $deleteTime = 'delete_time';
     protected $autoWriteTimestamp = true;


       public function getStatusAttr($value)
    {
        $status = [
            1=>'<a onclick="status('.$this->id.',0)">
                   <i class="fa fa-check text-navy"></i>启用
                </a>',
            0=>'<a onclick="status('.$this->id.',1)">
                    <i class="fa fa-close text-danger"></i>禁用
                </a>'
        ];
        return $status[$value];
    }



    // public function getCateName()
    // {
    //     return $this->hasOne('Category','id','cate_id')->field('title')->setAlias(['title'=>'cate_name']);
    // }
    


}

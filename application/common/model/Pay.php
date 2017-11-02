<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class Pay extends Model
{

	//支付模型

    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $autoWriteTimestamp = true;
	
	
	
	
}

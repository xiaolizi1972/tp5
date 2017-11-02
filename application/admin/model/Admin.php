<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Admin extends Model
{
   // use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $autoWriteTimestamp = true;
    protected $pk= 'admin_id';
    protected $table =  'tp_admin';


}

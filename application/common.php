<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//返回接口数据
function api ($status='200',$msg='ok',$data=[])
{
    
    return json(['status'=>$status,'message'=>$msg,'data'=>$data]);
    
}


function  pr($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    
}


function  vr($data){

    echo "<pre>";
    var_dump($data);
    echo "</pre>";

}
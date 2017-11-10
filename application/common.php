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

    die;
    
}   


function  vr($data){

    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}


/**
 * 创建目录
 * @param $path
 */
function create_dir($path){
    if(!is_dir($path)){
        mkdir(iconv("UTF-8", "GBK",$path),0777,true);
    }
}


//截取字符串
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)    
{    
    if(function_exists("mb_substr"))  
    {    
        if($suffix)    
            return mb_substr($str, $start, $length, $charset)."...";    
        else  
            return mb_substr($str, $start, $length, $charset);    
    }    
    elseif(function_exists('iconv_substr'))   
    {    
        if($suffix)    
            return iconv_substr($str,$start,$length,$charset)."...";    
        else  
            return iconv_substr($str,$start,$length,$charset);    
    }    
    $re['utf-8']   = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef]  
    [x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";    
    $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";    
    $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";    
    $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";    
    preg_match_all($re[$charset], $str, $match);    
    $slice = join("",array_slice($match[0], $start, $length));    
    if($suffix) return $slice."…";    
    return $slice;  
} 
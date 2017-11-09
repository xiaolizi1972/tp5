<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\controller\Image as Images;


/**
 * explain :上传图片类
 * author :xiaolizi
 * date:2017-11-9
 */


class Image extends Controller
{


    protected $images;

    public function  __construct(Images $images)
    {
        parent::__construct();
        $this->images =  $images;

    }


    //上传单张图片 
    public function image()
    {

        return  $this->images->image();

    }



    /**
     * 上传多张图片
     *
     */  
     public function images()
    {
        
    }



   
}

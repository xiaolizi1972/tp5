<?php

namespace app\common\controller;

use think\Controller;
use think\Request;
use app\common\controller\Image;
use app\common\model\Picture;

class Image extends Controller
{


    //上传单张图片
    public function image()
    {
    		$file =  request()->file('file');

    		if($file) {

    			//裁剪图片
	            $image = \think\Image::open($file);
	            $path  =  ROOT_PATH . 'public' . DS . 'uploads/';
	            $url   =  config('url_domain_root'). '/uploads/';

	            //图片名
	            $pic_name   = date('Ymdhis').'_'.rand(1000,9999).'.'.$image->type();

	            //保存原图
	            create_dir($path.'source_img/');
	            $image->save($path.'source_img/'.$pic_name,null,100);

	            //生成缩略图
	            create_dir($path.'thumb_img/');
	            $width   =  config('img_size_width');
	            $height  = config('img_size_height');
	            $image->thumb($width,$height)->save($path.'thumb_img/'.$pic_name);

	            $data =  array(
	            	'source_img'=> $url.'source_img/'.$pic_name,
	            	'thumb_img' => $url.'thumb_img/'.$pic_name,
	            	'create_time'=>time()
	            );


	            $pic =  Picture::create($data);

	            if($pic->id){
	            	return api(200,'操作成功',['id'=>$pic->id,'path'=>$url.'thumb_img/'.$pic_name]);
	            }

	            return api(500,'上传图片失败');
    		}

    		return  api(500,'您上传的格式不支持');


    }



    //上传多张图片
    public function  images()
    {


    }


    
}

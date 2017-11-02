<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\common\model\Pay as Pays;

class Pay extends Controller
{

	public function  index()
	{
		$pays  =  Pays::where('status',1)->select();
		
		return view('index',['pays'=>$pays]);
	}

	//选择支付方式
	public function  pay()
	{
			
	    $post      =  input('post.');
		$pay_name  =  Pays::where(['id'=>$post['pay_id'],'status'=>1])->value('name');
		if(!$pay_name){
			return "你选择的支付还未开通";die;
		}
		
		controller('common/'.$pay_name)->pay($post);
		
	}
		
	

	

}

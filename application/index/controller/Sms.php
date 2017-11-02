<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\common\controller\Sms as AliSms;

class Sms extends Controller
{
   

    /**
     * 发送短信
     *
     * @param  int $phone 手机号
     * @param  int $type  模板类型
	 * @param  int $code  随机验证码
	 * @param  string $template  短信模板
     */
    public function sendSms()
    {
		
        $aliSms =  new AliSms;
        $phone  =  input('param.phone');
        $code   =  rand(111111,999999);
		$type   =  input('param.type');
		
		if(empty($tpye)){
			return api(500,'缺少模板类型参数');
			
		}
		
		if(empty($phone)){
			return  api(500,'缺少手机号码');
		}
		
        $template   =  $aliSms->template($type,$code);

        if($aliSms->sendMessage($phone,$template,$code)){
			//记录日志
			$aliSms->smsLog($phone,$code,$remark)
            return api(200,'发送短信成功',$code);
        }

        return api(500,'发送短信失败');
        
    }






}

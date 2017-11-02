<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;
use think\Cache;


class Sms extends Controller
{
        public function apiSms($phone,$code,$template)
        {
            vendor('dysms.api_sdk.vendor.autoload');
            Config::load();
            //此处需要替换成自己的AK信息
            $accessKeyId = "LTAIzjaMfzMpzN7y";//参考本文档步骤2
            $accessKeySecret = "aQBCQRX1NICQ4Krk2oY2ewC6AlX4Ar";//参考本文档步骤2
            //短信API产品名（短信产品名固定，无需修改）
            $product = "Dysmsapi";
            //短信API产品域名（接口地址固定，无需修改）
            $domain = "dysmsapi.aliyuncs.com";
            //暂时不支持多Region（目前仅支持cn-hangzhou请勿修改）
            $region = "cn-hangzhou";
            //初始化访问的acsCleint
            $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
            DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
            $acsClient= new DefaultAcsClient($profile);
            $request = new SendSmsRequest;
            //必填-短信接收号码。支持以逗号分隔的形式进行批量调用，批量上限为1000个手机号码,批量调用相对于单条调用及时性稍有延迟,验证码类型的短信推荐使用单条调用的方式
            $request->setPhoneNumbers($phone);
            //必填-短信签名
            $request->setSignName("麦子科技");
            //必填-短信模板Code
            $request->setTemplateCode($template);
            //选填-假如模板中存在变量需要替换则为必填(JSON格式),友情提示:如果JSON中需要带换行符,请参照标准的JSON协议对换行符的要求,比如短信内容中包含\r\n的情况在JSON中需要表示成\\r\\n,否则会导致JSON在服务端解析失败
            $request->setTemplateParam("{\"code\":\"$code\",\"product\":\"麦子科技\"}");
            //选填-发送短信流水号
            $request->setOutId("1234");
            //发起访问请求
            $acsResponse = $acsClient->getAcsResponse($request);
        
        
        }




        /**
         * 发送短信接口
         * @param integer  $type 1:注册2:的找回密码3：
         */
        public  function sendSms()
        {
            
            $phone =  '13402858313';
            $code  =  rand(111111,999999);
            $type  =  input('post.code_sms',1);
            switch ($type)
            {
                case 1:
                    $template =  'SMS_97070058';
                    Cache::set('register',$code,60);
                    break;
                case 2:
                    $template =  'SMS_98225011';
                    Cache::set('save_password',$code,60);
                    break;
                case 3:
                    $template =  'SMS_98710007';
                    Cache::set('pay',$code,60);
                    break;
                
            }
                
            $this->apiSms($phone,$code,$template);
            return api(200,'发送成功',Cache::get('register'));  
                
            
        }

    

    
}

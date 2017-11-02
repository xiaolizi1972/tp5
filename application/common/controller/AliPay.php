<?php

namespace app\common\controller;

use think\Controller;
use think\Request;

class AliPay extends Controller
{


    /**
	 * 支付
	 *
	 * @param  string  $order_sn 商户订单号，商户网站订单系统中唯一订单号，必填
	 * @param  string  $order_name  订单名称，必填
	 * @param  float   $total_amount  付款金额，必填
	 * @param  string  $product  商品描述，可空
	 */
	 
    public function pay($post)
    {

			require_once  VENDOR_PATH.'aliPayPC/config.php';
			require_once  VENDOR_PATH.'aliPayPC/pagepay/service/AlipayTradeService.php';
			require_once  VENDOR_PATH.'aliPayPC/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

			$order_sn 	  = trim($post['order_sn']);
			$order_name   = trim($post['order_name']);
			$total_amount = trim($post['total_money']);
			$product 	  = trim($post['goods_name']);
			
			//构造参数
			$payRequestBuilder = new \AlipayTradePagePayContentBuilder();

			$payRequestBuilder->setBody($product);
			$payRequestBuilder->setSubject($order_name);
			$payRequestBuilder->setTotalAmount($total_amount);
			$payRequestBuilder->setOutTradeNo($order_sn);

			$aop = new \AlipayTradeService($config);

			$response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

			//输出表单
			return   $response;

		
    }
	
	
	

   /**
    * 支付回调
    *
    * @param $arr  array  GET参数;
    * @param $result boole  验证结果;
    * @param $out_trade_no  string  商户订单号
    * @param $trade_no  string  支付宝交易号
    * 
    */
   public function  callBack()
   {

       

   }

    
}

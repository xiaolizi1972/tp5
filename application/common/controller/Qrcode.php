<?php
namespace app\common\controller;

use think\Controller;
use think\Request;
use Endroid\QrCode\QrCode as QR;

class Qrcode extends Controller
{
   
    //生成二维码
    public function index()
    {
        $qrCode = new QR(); 

        $url = 'http://www.baidu.com';//加http://这样扫码可以直接跳转url
        $qrCode->setText($url)
        ->setSize(80)//大小
        ->setLabelFontPath(VENDOR_PATH.'endroid\qrcode\assets\noto_sans.otf')
        ->setErrorCorrectionLevel('high')
        ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
        ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
         ->setLabelFontSize(16);
        header('Content-Type: '.$qrCode->getContentType());
        echo $qrCode->writeString();
        exit;

    }

    
}

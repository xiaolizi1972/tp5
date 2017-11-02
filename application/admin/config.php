<?php
//配置文件
return [
    
    'http_exception_template'    =>  [
        // 定义404错误的重定向页面地址
        404 =>  APP_PATH.'admin/view/error/404.html',
        // 还可以定义其它的HTTP status
        
        500 =>  APP_PATH.'admin/view/error/500.html',
    ],
];
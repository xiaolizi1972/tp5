<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\www\demo\tp5\public/../application/admin\view\index\index.html";i:1509961793;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>H+ 后台主题UI框架 - 主页</title>

    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="__admin_style__/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="__admin_style__/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__admin_style__/css/animate.min.css" rel="stylesheet">
    <link href="__admin_style__/css/style.min.css?v=4.0.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="__admin_style__/img/profile_small.jpg" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo (isset($admin_user['user_name'] ) && ($admin_user['user_name']  !== '')?$admin_user['user_name'] :''); ?></strong>
                               </span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
									<a  data-toggle="modal" data-target="#myModal">修改密码</a>
                                </li>
									<li class="divider"></li>
                                <li>
									<a class="J_menuItem" href="profile.html">个人资料</a>
                                </li>
                               
									<li class="divider"></li>
                                <li>
									<a href="<?php echo url('admin/login/logout'); ?>">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">admin</div>
                    </li>

                     <li>
                        <a class="J_menuItem" href="<?php echo url('admin/index/welcome'); ?>">
                        <i class="fa  fa-home"></i>
                        <span class="nav-label">主页</span></a>
                    </li>
                    
                    <?php if(!(empty($menu_list) || (($menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator ) && $menu_list->isEmpty()))): if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): if( count($menu_list)==0 ) : echo "" ;else: foreach($menu_list as $key=>$menu): ?>
                    <li>
                        <a href="<?php echo $menu['url']; ?>">
                            <i class="<?php echo $menu['icon']; ?>"></i>
                            <span class="nav-label"><?php echo $menu['name']; ?></span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                        <?php if(!(empty($menu['child']) || (($menu['child'] instanceof \think\Collection || $menu['child'] instanceof \think\Paginator ) && $menu['child']->isEmpty()))): if(is_array($menu['child']) || $menu['child'] instanceof \think\Collection || $menu['child'] instanceof \think\Paginator): if( count($menu['child'])==0 ) : echo "" ;else: foreach($menu['child'] as $key=>$child): ?>
                            <li>
                                <a class="J_menuItem" href="<?php echo url($child['url']); ?>" data-index="0"><?php echo $child['name']; ?></a>
                            </li>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </ul>
                    </li> 
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
							<i class="fa fa-bars"></i>
						</a>


                        <!-- <ul class="nav navbar-top-links navbar-left" >
                            <li class="dropdown" style="margin-left: 50px;">
                                <a  href="#">
                                   <h3 style="color:#000000" >系统</h3>
                                </a>
                            </li>
                            <li class="dropdown" style="margin-left: 50px;">
                                <a  href="#">
                                   <h3>插件</h3>
                                </a>
                            </li>
                            <li class="hidden-xs" style="margin-left: 50px;">
                               <a  href="#">
                                   <h3 >商城</h3>
                                </a>
                            </li>
                          
                        </ul> -->

                    </div>

                    
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>通知
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
											上次登录时间:2017-8-1
                                            <span class="pull-right text-muted small">ip:(127.0.0.1)</span>
                                        </div>
                                    </a>
                                </li>
                               
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a class="J_menuItem" href="notifications.html">
                                            <strong>查看记录 </strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a href="/" class="J_menuItem" data-index="0">
							<i class="fa fa-home"></i>查看前台</a>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" href ="<?php echo url('admin/login/logout'); ?>" aria-expanded="false">
                                <i class="fa fa-tasks"></i> 退出
                            </a>
                        </li>
                    </ul>



                </nav>
            </div>
            
             <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo url('admin/index/welcome'); ?>" frameborder="0" data-id="<?php echo url('admin/index/welcome'); ?>" seamless></iframe>
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 2014-2015 <a href="http://www.zi-han.net/" target="_blank">zihan's blog</a>
                </div>
            </div>
        </div>
       
		
		<!-- 弹框 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			   <div class="modal-content">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-10">
								<h3 class="m-t-none m-b">修改密码</h3>
								<form role="form">
									<div class="form-group">
										<label>原密码</label>
										<input type="email" placeholder="请输入原密码" class="form-control">
									</div>
									<div class="form-group">
										<label>新密码：</label>
										<input type="password" placeholder="请输入新密码" class="form-control">
									</div>
									<div class="form-group">
										<label>确认密码：</label>
										<input type="password" placeholder="请输入确认密码" class="form-control">
									</div>
									<div>
										<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										<button class="btn  btn-primary" type="submit">确定
										</button>
									   
									</div>
								</form>
							</div>
						   
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		
        <!--返回顶部-->
        <!-- <div id="small-chat">
			<a class="glyphicon glyphicon-menu-up btn-primary btn-circle" onclick="back_top()" title="回到顶部"></a>
        </div> -->
    </div>
    <script src="__admin_style__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__admin_style__/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="__admin_style__/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="__admin_style__/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="__admin_style__/js/plugins/layer/layer.min.js"></script>
   <!--   <script src="layer/layer.js"></script> -->
    <script src="__admin_style__/js/hplus.min.js?v=4.0.0"></script>
    <script type="text/javascript" src="__admin_style__/js/contabs.min.js"></script>
    <script src="__admin_style__/js/plugins/pace/pace.min.js"></script>
	<!-- <script>
		function back_top(){
		alert(111);
			window.scrollTo(x-coord, y-coord);  
		}
	
	</script> -->
</body>

</html>
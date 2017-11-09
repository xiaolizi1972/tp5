<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\www\demo\tp5\public/../application/admin\view\pay\index.html";i:1510210479;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>H+ 后台主题UI框架 - 数据表格</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="__admin_style__/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="__admin_style__/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <!-- 表格样式 -->
    <link href="__admin_style__/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="__admin_style__/css/animate.min.css" rel="stylesheet">
    <link href="__admin_style__/css/style.min.css?v=4.0.0" rel="stylesheet">


</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>支付列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-1">
                            <a  href="<?php echo url('pay/create'); ?>" class="btn btn-primary ">添加</a>
                        </div>
						
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" placeholder="请输入关键词" class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover " id="editable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>支付名称</th>
                                    <th>支付类</th>
                                    <th>回调地址</th>
									<th>状态</th>
									<th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!(empty($pays) || (($pays instanceof \think\Collection || $pays instanceof \think\Paginator ) && $pays->isEmpty()))): if(is_array($pays) || $pays instanceof \think\Collection || $pays instanceof \think\Paginator): $i = 0; $__LIST__ = $pays;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pay): $mod = ($i % 2 );++$i;?>
                                <tr class="gradeX" id="rem<?php echo $pay->id; ?>">
                                    <td><?php echo $pay->id; ?></td>
                                    <td><?php echo $pay->name; ?></td>
                                    <td><?php echo $pay->title; ?></td>
                                    <td class="center"><?php echo $pay->return_url; ?></td>
									<td class="center">
										<?php echo $pay->status; ?>
									</td>
                                    <td class="center">
										<a class="glyphicon glyphicon-pencil" title="编辑" href="<?php echo url('admin/pay/edit',array('id'=>$pay->id)); ?>"></a>
										<a class="glyphicon glyphicon-trash"  title="删除" onclick="del(<?php echo $pay->id; ?>)"></a>
										<a class="glyphicon glyphicon-eye-open" title="查看" href="show.html"></a>
									</td>
                                </tr>
                             <?php endforeach; endif; else: echo "" ;endif; endif; ?>   
                            </tbody>

                        </table>
						
						<div class="row">

							<div class="pull-right col-sm-6">
								<div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
									<?php echo $pays->render(); ?>
								</div>
							</div>
						</div>
						
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 弹框 -->
   

    <script src="__admin_style__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__admin_style__/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="__admin_style__/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="__admin_style__/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="__admin_style__/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	
	<!-- 插件 -->
	 <script src="__admin_style__/js/plugins/layer/layer.min.js"></script>
	<!-- 自定义 -->
	<script>
		//删除
        function  del(id){
            
            layer.confirm('您确定要删除？', {
                skin: 'layui-layer-molv', //样式类名
                btn: ['确定','取消'] //按钮
                
                }, function(){
                    var url = '/admin/admin/delete/'+id;
                    $.get(url,function(rs){
                        layer.msg(rs.message);
                        if(rs.status == 200){
                            $('#rem'+id).remove();
                        }
                    });
                }
            );
        }
            
       function status(id,status)
       {
            $.get("<?php echo url('admin/status'); ?>",{id:id,status:status},function(rs){
                layer.msg(rs.message)
                if(rs.status == 200){
                  setTimeout(function (){
                        window.location.reload();
                  },1000);
                  
                }
            });
       }
    
	
	
	</script>
   
</body>

</html>
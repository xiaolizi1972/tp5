<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\www\demo\tp5\public/../application/admin\view\menu\index.html";i:1506419898;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加菜单</title>
    <meta name="keywords" content="添加菜单">
    <meta name="description" content="添加菜单">

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="__admin_style__/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="__admin_style__/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <!-- 表格样式 -->
    <link href="__admin_style__/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="__admin_style__/css/animate.min.css" rel="stylesheet">
    <link href="__admin_style__/css/style.min.css?v=4.0.0" rel="stylesheet">
   <!--  <base target="_blank"> -->

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>菜单列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-1">
                            <a onclick="" href="<?php echo url('menu/create'); ?>" class="btn btn-primary ">添加</a>
                        </div>
                        
                        <table class="table table-striped table-bordered table-hover " id="editable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>菜单名称</th>
                                    <th>路由地址</th>
                                    <th>状态</th>
									<th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!(empty($menus) || (($menus instanceof \think\Collection || $menus instanceof \think\Paginator ) && $menus->isEmpty()))): if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                                <tr class="gradeX" id="rem<?php echo $menu->id; ?>">
                                    <td><?php echo $menu->id; ?></td>
                                    <td><?php echo $menu->name; ?></td>
                                    <td><?php echo $menu->url; ?></td>
									<td class="center">
                                        <?php echo $menu->status; ?>
									</td>
                                    <td class="center">
										<a class="glyphicon glyphicon-pencil" title="编辑" href="<?php echo url('admin/menu/edit',array('id'=>$menu->id)); ?>"></a>
										<a class="glyphicon glyphicon-trash"  title="删除" onclick="del(<?php echo $menu->id; ?>)"></a>
										
									</td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>  
                            </tbody>

                        </table>
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    var url = '/admin/menu/delete/'+id;
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
            $.get("<?php echo url('menu/status'); ?>",{id:id,status:status},function(rs){
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
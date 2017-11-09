<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\www\demo\tp5\public/../application/admin\view\admin\create.html";i:1506586389;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>H+ 后台主题UI框架 - 基本表单</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="__admin_style__/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="__admin_style__/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__admin_style__/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="__admin_style__/css/animate.min.css" rel="stylesheet">
    <link href="__admin_style__/css/style.min.css?v=4.0.0" rel="stylesheet">
     <!-- 验证 -->
    <link rel="stylesheet" href="__admin_style__/dist/css/bootstrapValidator.css"/>
   

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>表单列表 <small>/添加表单</small></h5>
                       
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="<?php echo url('admin/save'); ?>" id="myform" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">账户</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入账户名" name="user_name">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入账户密码" name="password" value="123456"> 
                                    <span class="help-block m-b-none" >      
                                        (默认密码123456)
                                    </span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">手机</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入手机号码" name="phone">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">角色</label>

                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="role_id">
                                        <option value="">---请选择角色---</option>
                                        <?php if(!(empty($roles) || (($roles instanceof \think\Collection || $roles instanceof \think\Paginator ) && $roles->isEmpty()))): if(is_array($roles) || $roles instanceof \think\Collection || $roles instanceof \think\Paginator): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$role): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $role->role_id; ?>"><?php echo $role->name; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">切换按钮</label>
                                <div class="col-sm-4">
                                <div class="input-group">
                                     <div class="switch">
                                        <div class="onoffswitch">
                                            <input type="checkbox" checked class="onoffswitch-checkbox" id="example1" name="status">
                                            <label class="onoffswitch-label" for="example1">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div> 
                                </div>  
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="__admin_style__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__admin_style__/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="__admin_style__/js/plugins/iCheck/icheck.min.js"></script>
     <script src="__admin_style__/dist/js/bootstrapValidator.js"></script>
    <script src="__admin_style__/js/layer/layer.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
       
        $('#myform')
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    user_name: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: '账户不能为空'
                            },
                            stringLength: {
                                max: 24,
                                message: '账户不能超过24个字符'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.\u4e00-\u9fa5]+$/,
                                message: '账户只能是中英文,下划线和数字'
                            }
                        }
                    },
                    password: {
                        validators: {
                           /* notEmpty: {
                                message: '密码不能为空'
                            },*/
                            stringLength: {
                                min:6,
                                max: 24,
                                message: '密码长度在6-24个字符'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: '密码只能是英文,下划线和数字'
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: '手机不能为空'
                            },
                            
                            regexp: {
                                regexp: /^1[34578]\d{9}$/,
                                message: '手机号码格式不正确'
                            }
                        }
                    },
                     role_id: {
                        validators: {
                            notEmpty: {
                                message: '请选择角色'
                            },
                            
                        }
                    }


                }
            })
            .on('success.form.bv', function(e) {
                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function(rs) {
                    layer.msg(rs.message)
                    if(rs.status == 200){
                        setTimeout(function (){
                            window.location.href = "<?php echo url('rule/index'); ?>"
                        },1000);
                    }
                    
                }, 'json');
            });
    });
</script>
</body>

</html>
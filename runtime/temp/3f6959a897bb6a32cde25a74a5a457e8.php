<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\www\demo\tp5\public/../application/admin\view\pay\create.html";i:1510213381;}*/ ?>
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
    <!-- 文件上传 -->
    <link rel="stylesheet" type="text/css" href="__admin_style__/js/webuploader/css/webuploader.css">
    <link href="__admin_style__/js/bootstrapUploade/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>支付列表 <small>/添加支付</small></h5>
                       
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="<?php echo url('pay/save'); ?>" id="myform" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">支付名称</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入支付名称" name="title">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">支付类</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入支付类" name="name" > 
                                    <span class="help-block m-b-none" >      
                                        (例如AliPay)
                                    </span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">APPID</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="请输入APPID" name="app_id">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">商家私钥</label>

                                <div class="col-sm-4">
                                  <input type="text" class="form-control" placeholder="请输入商家私钥" name="key">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">同步回调地址</label>

                                <div class="col-sm-4">
                                  <input type="text" class="form-control" placeholder="请输入同步回调地址" name="return_url">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">封面</label>
                                <input type="hidden" name="cover_id" id="cover_id" value="">
                                <div class="col-sm-4">
                                    <div class="input-group">  
                                        <div id="uploader-demo">
                                            <!--用来存放item-->
                                            <div id="fileList" class="uploader-list"></div>
                                            <div id="filePicker" class="">选择图片</div>
                                            <div  class="file-item" >
                                                <img  src="" id="imgs">
                                                <div class="info"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否开通</label>
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
                                    <button class="btn btn-white" type="button" onClick="javascript :history.back(-1);">取消</button>
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

    <!-- 上传文件 -->
    <script src="__admin_style__/js/webuploader/webuploader.js"></script>
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
                    title: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: '支付名称不能为空'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.\u4e00-\u9fa5]+$/,
                                message: '账户只能是中英文,下划线和数字'
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: '支付类'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: '密码只能是英文,下划线和数字'
                            }
                        }
                    },
                    key: {
                        validators: {
                            notEmpty: {
                                message: '请输入商户私钥'
                            } 
                          
                        }
                    },
                    app_id: {
                        validators: {
                            notEmpty: {
                                message: '请输入APPID'
                            },
                            
                        }
                    },
                    return_url: {
                        validators: {
                            notEmpty: {
                                message: '请输入回调地址'
                            },
                            
                        }
                    },


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
                            window.location.href = "<?php echo url('pay/index'); ?>"
                        },1000);
                    }
                    
                }, 'json');
            });


             //文件上传
             //初始化Web Uploader
            var uploader = WebUploader.create({
                // 自动上传
                auto: true,
                // swf文件路径
                swf: 'js/webuploader/dist/Uploader.swf',
                // 提交地址
                server: 'http://www.admin.com/admin/image/image',
                // 选择文件的按钮。可选。
                pick: '#filePicker',
                // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                resize: false,
                // 允许上传的格式
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/*'
                },
                 duplicate :true //是否重复上传
            });

            // 上传成功回调
            uploader.on( 'uploadSuccess', function( file,response ) {
               
                //console.log(response);
                 $('#imgs').css({"width":"200","height":"200"});
                 $('#imgs').attr('src',response.data.path);
                $('#cover_id').val(response.data.id);
                // console.log(response.data.id);
    
            });

            //alert(response.data.id);

    });
</script>
</body>

</html>
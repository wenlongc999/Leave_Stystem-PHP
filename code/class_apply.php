<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>请假管理系统</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/static/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/static/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/static/css/amazeui.min.css" />
    <link rel="stylesheet" href="/static/css/admin.css">
    <link rel="stylesheet" href="/static/css/app.css">
</head>

<body data-type="generalComponents">
<?php
require 'header.php';
require 'menu.php';
?>

        <div class="tpl-content-wrapper">
            <!--<div class="tpl-content-page-title">-->
                <!--Amaze UI 表单-->
            <!--</div>-->
            <!--<ol class="am-breadcrumb">-->
                <!--<li><a href="#" class="am-icon-home">首页</a></li>-->
                <!--<li><a href="#">表单</a></li>-->
                <!--<li class="am-active">Amaze UI 表单</li>-->
            <!--</ol>-->
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 添加班级
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                                <!--<i class="am-icon-search"></i>-->
                                <input type="hidden" class="form-control form-control-solid" placeholder="搜索..."> </div>
                        </div>
                    </div>


                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form class="am-form am-form-horizontal" id="my_form" method="post" action="class_apply.php">
                                <input type="hidden" value="1" name="flag">
                                <!--<input type="hidden" value="" name="l_s_id" id="l_s_id">-->
                                <!--<input type="hidden" value="" name="l_c_id" id="l_c_id">-->
                                <div class="am-form-group">
                                    <label for="" class="am-u-sm-3 am-form-label"></label>
                                    <div class="am-u-sm-9">
                                        <!--<input type="text" name="l_s_username" id="user-name" placeholder="请输入姓名">-->
                                        <?php
                                        require ('database.php');
                                        $database = new database();
                                        if(!empty($_POST['flag'])){
                                            $data['c_name'] = $_POST['c_name'];
                                            $data['c_grade'] = $_POST['s_g_id'];
                                            $database->class_InsertInfo($data);
                                            ?><small id="state" style="color: #F7B824;font-size: 16px;">添加成功</small> <?php
                                        }else{
                                            ?><small id="state" style="color: #F7B824;font-size: 16px;"></small> <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="c_name" class="am-u-sm-3 am-form-label">班级名称</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="c_name" id="c_name" placeholder="请输入班级名称">
                                        <small></small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="c_g_id" class="am-u-sm-3 am-form-label">级别</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="s_g_id" id="s_g_id" placeholder="请输入级别">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="button" class="am-btn am-btn-primary" onclick="validate()">添加信息</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/amazeui.min.js"></script>
    <script src="/static/js/app.js"></script>
<script>
    function validate() {
        var c_name = document.getElementById('c_name').value;
        var s_g_id = document.getElementById('s_g_id').value;

        if (c_name == ''){
            document.getElementById('state').innerHTML = '班级未填写';
        }else if (s_g_id == ''){
            document.getElementById('state').innerHTML = '级别未填写';
        }else {
            document.getElementById('my_form').submit();
        }
    }

</script>
</body>

</html>
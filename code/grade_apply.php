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
                        <span class="am-icon-code"></span> 添加级别
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
                            <form class="am-form am-form-horizontal" id="my_form" method="post" action="grade_apply.php">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label"></label>
                                    <div class="am-u-sm-9">
                                        <!--<input type="text" name="l_s_card" id="user-card" placeholder="请输入学号">-->
                                        <!--<button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button"></button>-->
                                        <?php
                                        require ('database.php');
                                        $database = new database();
                                        if(!empty($_POST['flag'])){
                                            $data['g_name'] = $_POST['g_name'];
                                            $data['g_addtime'] = date("Y-m-d");
//                                            echo date("Y-m-d");
                                            $database->grade_InsertInfo($data);
                                            ?><small id="state" style="color: #F7B824;font-size: 16px;">添加成功</small> <?php
                                        }else{
                                            ?><small id="state" style="color: #F7B824;font-size: 16px;"></small> <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <input type="hidden" value="1" name="flag">
                                <div class="am-form-group">
                                    <label for="g_name" class="am-u-sm-3 am-form-label">级别名称</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="g_name" id="g_name" placeholder="请输入级别,例如2015,2016">
                                        <small></small>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="button" class="am-btn am-btn-primary" onclick="validate()">添加级别</button>
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
        var g_name = document.getElementById('g_name').value;

        if (g_name == ''){
            document.getElementById('state').innerHTML = '姓名未填写';
        }else {
            document.getElementById('my_form').submit();
        }
    }

</script>
</body>

</html>
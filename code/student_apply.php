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
                        <span class="am-icon-code"></span> 添加学生
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
                            <form class="am-form am-form-horizontal" id="my_form" method="post" action="student_apply.php">
                                <div class="am-form-group">
                                    <label  class="am-u-sm-3 am-form-label"></label>
                                    <div class="am-u-sm-9">
                                        <!--<input type="text" name="l_s_card" id="user-card" placeholder="请输入学号">-->
                                        <!--<button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button"></button>-->
                                        <?php
                                        require ('database.php');
                                        $database = new database();
                                        if(!empty($_POST['flag'])){
                                            $data['s_card'] = $_POST['s_card'];
                                            $data['s_username'] = $_POST['s_username'];
                                            $data['s_phone'] = $_POST['s_phone'];
                                            $data['s_grade'] = $_POST['s_g_id'];
                                            $data['s_class'] = $_POST['s_c_id'];
                                            $data['s_addtime'] = date("Y-m-d");
                                            $data['s_state'] = 1;
                                            $database->student_InsertInfo($data);
                                            ?><small id="state" style="color: #F7B824;font-size: 16px;">添加成功</small> <?php
                                        }else{
                                            ?><small id="state" style="color: #F7B824;font-size: 16px;"></small> <?php
                                        }
                                        ?>

                                    </div>

                                </div>
                                <div class="am-form-group">
                                    <label for="s_card" class="am-u-sm-3 am-form-label">学号</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="s_card" id="s_card" placeholder="输入学号">
                                        <!--<button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button"></button>-->
                                        <!--<small>输入学号点击查询，其他信息会自动填写。</small>-->
                                    </div>
                                </div>
                                <input type="hidden" value="1" name="flag">
                                <div class="am-form-group">
                                    <label for="s_username" class="am-u-sm-3 am-form-label">姓名</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="s_username" id="s_username" placeholder="输入姓名">
                                        <small></small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="s_phone" class="am-u-sm-3 am-form-label">手机号</label>
                                    <div class="am-u-sm-9">
                                        <input type="tel" name="s_phone" id="s_phone" placeholder="输入手机号">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="s_g_id" class="am-u-sm-3 am-form-label">级别</label>
                                    <div class="am-u-sm-9">
                                        <input type="tel" name="s_g_id" id="s_g_id" placeholder="输入级别">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="s_c_id" class="am-u-sm-3 am-form-label">班级</label>
                                    <div class="am-u-sm-9">
                                        <input type="tel" name="s_c_id" id="s_c_id" placeholder="输入班级">
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

    function change_class(){
        var s_g_id = document.getElementById('s_g_id').value;
        $.get("/index.php?c=student&a=apply_ajax&s_g_id=" + s_g_id, function(data){
            var res = eval("(" + data + ")");//转为Object对象
            var str = '<option value="">请选择班级</option>';
            for (var i=0;i<res.length;i++){
                str = str + '<option value="' + res[i].c_id + '">' + res[i].c_name + '</option>';
            }
            document.getElementById('s_c_id').innerHTML = str;
        });
    }
</script>
<script>
    function validate() {
        var s_username = document.getElementById('s_username').value;
        var s_card = document.getElementById('s_card').value;
        var s_phone = document.getElementById('s_phone').value;
        var s_g_id = document.getElementById('s_g_id').value;
        var s_c_id = document.getElementById('s_c_id').value;

        if (s_username == ''){
            document.getElementById('state').innerHTML = '姓名未填写';
        }else if (s_card == ''){
            document.getElementById('state').innerHTML = '学号未填写';
        }else if (s_phone == ''){
            document.getElementById('state').innerHTML = '手机号未填写';
        }else if (s_g_id == ''){
            document.getElementById('state').innerHTML = '级别未填写';
        }else if (s_c_id == ''){
            document.getElementById('state').innerHTML = '班级未填写';
        }else {
            document.getElementById('my_form').submit();
        }
    }

</script>
</body>

</html>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>请假管理系统</title>
    <meta name="description" content="请假管理系统">
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
                <!--Amaze UI 文字列表-->
            <!--</div>-->
            <!--<ol class="am-breadcrumb">-->
                <!--<li><a href="#" class="am-icon-home">首页</a></li>-->
                <!--<li><a href="#">Amaze UI CSS</a></li>-->
                <!--<li class="am-active">文字列表</li>-->
            <!--</ol>-->
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 假条注销
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <!--<div class="am-u-sm-12 am-u-md-6">-->
                            <!--<div class="am-btn-toolbar">-->
                                <!--<div class="am-btn-group am-btn-group-xs">-->
                                    <!--<button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button>-->
                                    <!--&lt;!&ndash;<button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>&ndash;&gt;-->

                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->

                        <div class="am-u-sm-12 am-u-md-3">
                            <div class="am-form-group" style="float: inherit" >
                                <!--<select data-am-selected="{btnSize: 'sm'}" id="s_g_id" name="s_g_id" onchange="change_class()">-->
                                    <!--<option value="0">选择级别</option>-->
                                    <!--<volist name="grade_list" id="list">-->
                                        <!--<option value="{$list.g_id}">{$list.g_name}</option>-->
                                    <!--</volist>-->
                                <!--</select>-->
                            </div>

                            <!--<div class="am-form-group" style="float: inherit">-->
                                <!--<select data-am-selected="{btnSize: 'sm'}">-->
                                    <!--<option value="option1">选择学生</option>-->
                                <!--</select>-->
                            <!--</div>-->
                        </div>

                        <!--<div class="am-u-sm-12 " style="width: 25%">-->
                            <!--<div class="am-input-group am-input-group-sm">-->
                                <!--<input type="text" class="am-form-field" placeholder="请输入学号进行查找">-->
                                <!--<span class="am-input-group-btn">-->
            <!--<button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button"></button>-->
          <!--</span>-->
                            <!--</div>-->
                        <!--</div>-->
                    </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <!--<th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>-->
                                            <!--<th class="table-id">ID</th>-->
                                            <th class="table-title">学号</th>
                                            <th class="table-type">姓名</th>
                                            <th class="table-author am-hide-sm-only">级别</th>
                                            <th class="table-author am-hide-sm-only">班级</th>
                                            <th class="table-author am-hide-sm-only">联系方式</th>
                                            <th class="table-date am-hide-sm-only">请假时间</th>
                                            <th class="table-date am-hide-sm-only">销假时间</th>
                                            <th class="table-date am-hide-sm-only">操作</th>
<!--                                            <th class="table-date am-hide-sm-only">状态</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require ('database.php');
                                    $databse = new database();
                                    if(!empty($_GET['type'])){
                                        $type = $_GET['type'];
                                        if ($type=='leave'){
                                            if(!empty($_GET['l_id'])){
                                                $l_id = $_GET['l_id'];
                                                $databse->leave_delete($l_id);
                                                echo "<script>location.href='leave.php';</script>";

                                            }
                                        }
                                    }
                                    $list = $databse->leave_ListInfo();
                                    while($line = mysqli_fetch_array($list)){
                                    //                                        var_dump($line[0]);echo "<br>";
                                    ?>
                                        <tr>
                                            <!--<td><input type="checkbox"></td>-->
                                            <!--<td>{$list.l_id}</td>-->
                                            <td><a href="#"><?php echo $line['l_s_card'];?></a></td>
                                            <td><?php echo $line['l_s_username'];?></td>
                                            <td class="am-hide-sm-only"><?php echo $line['l_s_grade'];?>级</td>
                                            <td class="am-hide-sm-only"><?php echo $line['l_s_class'];?>班</td>
                                            <td class="am-hide-sm-only"><?php echo $line['l_s_phone'];?></td>
                                            <td class="am-hide-sm-only"><?php echo $line['l_begintime'];?></td>
                                            <td class="am-hide-sm-only"><?php echo $line['l_endtime'];?></td>
                                            <td class="am-hide-sm-only"><a class="label label-sm " style="background-color: #01AAED" onclick="Look_Leave(<?php echo $line['l_id'];?>)">销假</a></td>
                                        </tr>
                                    <?php }?>

                                    </tbody>
                                </table>
                                <!--<div class="am-cf">-->

                                    <!--<div class="am-fr">-->
                                        <!--<ul class="am-pagination tpl-pagination">-->
                                            <!--<li class="am-disabled"><a href="#">«</a></li>-->
                                            <!--<li class="am-active"><a href="#">1</a></li>-->
                                            <!--<li><a href="#">2</a></li>-->
                                            <!--<li><a href="#">3</a></li>-->
                                            <!--<li><a href="#">4</a></li>-->
                                            <!--<li><a href="#">5</a></li>-->
                                            <!--<li><a href="#">»</a></li>-->
                                        <!--</ul>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <hr>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>


        </div>

    </div>


    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/amazeui.min.js"></script>
    <script src="/static/js/app.js"></script>
<script>

    function Look_Leave(obj){
        location.href = "leave.php?type=leave&l_id=" + obj;
    }
</script>
</body>

</html>
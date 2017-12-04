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
                <span class="am-icon-code"></span> 删除学生
            </div>
            <div class="tpl-portlet-input tpl-fz-ml">
                <div class="portlet-input input-small input-inline">
                    <div class="input-icon right">
                        <!--<i class="am-icon-search"></i>-->
                        <!--<input type="text" class="form-control form-control-solid" placeholder="搜索..."> -->
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
                    <h3 class="am-form-group" style="color: red;">提示：删除后数据不可恢复</h3>
                </div>

                <div class="am-u-sm-12 " style="width: 25%">
                    <form action="student_delete.php" method="get">
                        <div class="am-input-group am-input-group-sm">
                            <input type="text" placeholder="输入要查找的班级名称" name="c_name" class="am-form-field">
                            <span class="am-input-group-btn">
            <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="submit"></button>
          </span>
                        </div></form>
                </div>
            </div>
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                <th class="table-id">ID</th>
                                <th class="table-title">学号</th>
                                <th class="table-type">姓名</th>
                                <th class="table-author am-hide-sm-only">级别</th>
                                <th class="table-author am-hide-sm-only">班级</th>
                                <!--<th class="table-author am-hide-sm-only">联系方式</th>-->
                                <th class="table-date am-hide-sm-only">添加时间</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require ('database.php');
                            $databse = new database();
                            if(!empty($_GET['type'])){
                                 $type = $_GET['type'];
                                 if ($type=='delete'){
                                     if(!empty($_GET['s_id'])){
                                         $s_id = $_GET['s_id'];
                                         $databse->student_delete($s_id);
                                         $c_name = $_GET['c_name'];
                                         echo "<script>location.href='student_delete.php?c_name'.$c_name;</script>";

                                     }
                                 }
                            }
                            if(empty($_GET['c_name'])){
                                $c_name = '';
                            }else{
                                $c_name = $_GET['c_name'];
                            }
                            $list = $databse->student_ListInfo(''.$c_name);
                            while($line = mysqli_fetch_array($list)){
                            //                                        var_dump($line[0]);echo "<br>";
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $line['s_id']?></td>
                                    <td><?php echo $line['s_card']?></td>
                                    <td><?php echo $line['s_username']?></td>
                                    <td class="am-hide-sm-only"><?php echo $line['s_grade']?>级</td>
                                    <td class="am-hide-sm-only"><?php echo $line['s_class']?>班</td>
<!--                                    <td class="am-hide-sm-only">--><?php //echo $line['s_phone']?><!--</td>-->
                                    <td class="am-hide-sm-only"><?php echo $line['s_lastleave']?></td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <!--<button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>-->
                                                <!--<button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 复制</button>-->
                                                <a href="student_delete.php?type=delete&s_id=<?php echo $line['s_id']?>&c_name=<?php echo $c_name;?>" style="color: red;" ><span class="am-icon-trash-o"></span> 删除</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                            ?>

                            </tbody>
                        </table>
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

    function get_ClassList(){
        var c_g_id = document.getElementById('c_g_id').value;
        location.href = "/index.php?c=class&a=delete&c_g_id="+c_g_id;
    }

</script>
</body>

</html>
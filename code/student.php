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
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 学生信息
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
<!--                                <i class="am-icon-search"></i>-->
                                <input type="hidden" class="form-control form-control-solid" placeholder="搜索..."> </div>
                        </div>
                    </div>


                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button>
                                </div>
                            </div>
                        </div>

                        <div class="am-u-sm-12 " style="width: 25%">
                            <form action="student.php" method="post">
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
                                            <th class="table-author am-hide-sm-only">联系方式</th>
                                            <th class="table-date am-hide-sm-only">最近请假日期</th>
                                            <!--<th class="table-set">操作</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require ('database.php');
                                    $databse = new database();
                                    if(empty($_POST['c_name'])){
                                        $c_name = '';
                                    }else{
                                        $c_name = $_POST['c_name'];
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
                                            <td class="am-hide-sm-only"><?php echo $line['s_phone']?></td>
                                            <td class="am-hide-sm-only"><?php echo $line['s_lastleave']?></td>
                                            <!--<td>-->
                                                <!--<div class="am-btn-toolbar">-->
                                                    <!--<div class="am-btn-group am-btn-group-xs">-->
                                                        <!--<button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>-->
                                                        <!--&lt;!&ndash;<button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 复制</button>&ndash;&gt;-->
                                                        <!--<button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>-->
                                                    <!--</div>-->
                                                <!--</div>-->
                                            <!--</td>-->
                                        </tr>
                                        <?php
                                        }
                                        ?>

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


                    <br><br><br><br><br><br><br>
                </div>
                <div class="tpl-alert"></div>
            </div>


        </div>

    </div>


    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/amazeui.min.js"></script>
    <script src="/static/js/app.js"></script>
<script>

    function get_StudentList(){
        var s_g_id = document.getElementById('s_g_id').value;
        var s_c_id = document.getElementById('s_c_id').value;
        location.href = "/index.php?c=student&a=index&s_g_id="+s_g_id+"&s_c_id="+s_c_id;
    }
    function change_class(){
        var s_g_id = document.getElementById('s_g_id').value;
        $.get("/index.php?c=student&a=apply_ajax&s_g_id=" + s_g_id, function(data){
            var res = eval("(" + data + ")");//转为Object对象
            var str = '<option value="0">请选择班级</option>';

            for (var i=0;i<res.length;i++){
                str = str + '<option value="' + res[i].c_id + '">' + res[i].c_name + '</option>';
            }
            document.getElementById('s_c_id').innerHTML = str;
        });
    }
</script>
</body>

</html>
<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>理发后台管理</title>
    <link rel="stylesheet" type="text/css" href="/school+/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/school+/Public/css/main.css"/>
    <script type="text/javascript" src="/school+/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/school+/Public/js/jquery-2.2.3.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="http://www.jscss.me">管理员</a></li>
                <li><a href="http://www.jscss.me">修改密码</a></li>
                <li><a href="http://www.jscss.me">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#">店铺管理</a>
                    <ul class="sub-menu">
                        <li><a href="/school+/Lifaadmin/seller">查看店铺信息</a></li>
                        <li><a href="/school+/Lifaadmin/seller/changeseller">编辑店铺信息</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">理发预约管理</a>
                            <ul class="sub-menu">
                                <li><a href="/school+/Lifaadmin/lifa/addlifa">添加预约时间</a></li>
                                <li><a href="/school+/Lifaadmin/lifa/managelifa">管理预约时间</a></li>
                                <li><a href="/school+/Lifaadmin/lifa/dingdan">管理预约订单</a></li>
                            </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--/sidebar-->
    
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><span class="crumb-step">&gt;</span><span>理发预约订单管理</span><span class="crumb-step">&gt;</span><span>查看订单</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/jscss/admin/design/add" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <td>订单ID</td>
                            <td><?php echo ($lifadan["or_tdid"]); ?></td>

                        </tr>
                         <tr>
                             <td>预约者姓名</td>
                             <td><?php echo ($lifadan["hair_name"]); ?></td>

                         </tr>
                        <tr>
                            <td>预约理发种类头发长度</td>
                            <td><?php echo ($lifadan["or_typename"]); ?>，头发长度为：<?php echo ($lifadan["hair_long"]); ?></td>
                        </tr>
                        <tr>
                            <td>预约者联系方式</td>
                            <td><?php echo ($lifadan["hair_number"]); ?></td>

                        </tr>
                        <tr>
                            <td>预约时间</td>
                            <td><?php echo ($lifadan["or_tdtime"]); ?></td>
                        </tr>

                        <tr>
                            <td>客户备注</td>
                            <td><?php echo ($lifadan["hair_content"]); ?></td>
                        </tr>
                        <tr>
                            <td>订单状态</td>
                            <td><?php echo ($lifadan["ts_idd"]); ?>
                                <?php
 switch ($lifadan["ts_idd"]) { case 1: echo "理发预约取消"; break; case 2: echo "理发预约完成"; break; case 3: echo "理发预约推迟10分钟"; break; default: echo "理发预约进行中"; };?>
                            </td>
                        </tr>
                        </tbody></table>

                    <a class="btn btn-primary btn2 mr3" href="/school+/lifaadmin/lifa/danConfirm?id=<?php echo ($lifadan["or_tdid"]); ?>">确认预约</a>
                    <a class="btn btn-primary btn2 mr1" href="/school+/lifaadmin/lifa/danCancel?id=<?php echo ($lifadan["or_tdid"]); ?>">取消预约</a>

                    <a id="delete" name="<?php echo ($lifadan["or_tdid"]); ?>" class="btn btn-primary btn2 mr1">删除订单</a>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
    <script type="text/javascript">
        $(document).ready(function(){
            //检测js文件是否引入成功
            console.log('恭喜你,jquery文件引入成功');

            $("#delete").click(function(){
                var alarm = confirm('是否确定要删除？');
                confirm(alarm);
                if(alarm == true){
                    var id = $(this).attr('name');
                    confirm(id);

                    //attr()设置被选元素的属性和值。//获取要删除的数据的id
                    var self = $(this);
                    $.post("<?php echo U('lifaadmin/lifa/danDelete');?>",//执行删除操作的页面
                            {'id':id},//删除页面所需要的要删除的数据id

                            function(data){
                                //请求成功后隐藏该记录
                               if(confirm("删除成功,刷新页面生效，如需恢复订单请联系管理员")){
                                   history.go(-1);
                               }
                            }//function(data)处的括号
                    );//post结尾处的括号

                }
            });
        });
    </script>
    <!--/main-->
</div>
</body>
</html>
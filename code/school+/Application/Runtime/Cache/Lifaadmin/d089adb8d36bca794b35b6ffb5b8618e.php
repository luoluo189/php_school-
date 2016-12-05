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
                            <td>预约理发种类</td>
                            <td><?php echo ($lifadan["or_typename"]); ?></td>

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
                    <a class="btn btn-primary btn2 mr1" href="/school+/lifaadmin/lifa/danDelete?id=<?php echo ($lifadan["or_tdid"]); ?>">删除订单</a>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->

    <!--/main-->
</div>
</body>
</html>
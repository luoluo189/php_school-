<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/school+/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/school+/Public/css/main.css"/>
    <script type="text/javascript" src="/school+/Public/js/libs/modernizr.min.js"></script>
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
            <h1>校园+</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>兼职管理</a>
                    <ul class="sub-menu">
                        <li><a href="/school+/ParttimejobAdmin/parttimejob/add"><i class="icon-font">&#xe008;</i>添加兼职</a></li>
                        <li><a href="/school+/ParttimejobAdmin/parttimejob/manage"><i class="icon-font">&#xe004;</i>管理已发布兼职</a></li>
                        <!--<li><a href="ParttimejobAdmin/parttimejob/order"><i class="icon-font">&#xe004;</i>管理兼职订单</a></li>-->
                        <li><a href="/school+/ParttimejobAdmin/parttimejob/order"><i class="icon-font">&#xe004;</i>管理兼职订单</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--/sidebar-->
    
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><span class="crumb-step">&gt;</span><span>兼职订单管理</span><span class="crumb-step">&gt;</span><span>查看订单</span></div>
        </div>
        <div class="search-wrap">

        </div>
        <div class="result-wrap">
            <div class="result-content">

                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <td>订单ID</td>
                            <td><?php echo ($orders[0]['pt_trid']); ?></td>
                        </tr>
                         <tr>
                             <td>预约者姓名</td>
                             <td><?php echo ($orders[0]['pt_pname']); ?></td>
                         </tr>
                        <tr>
                            <td>预约工作名称</td>
                            <td><?php echo ($orders[0]['pt_inname']); ?></td>
                        </tr>
                        <tr>
                            <td>预约者联系方式</td>
                            <td><?php echo ($orders[0]['pt_pphone']); ?></td>
                        </tr>
                        <tr>
                            <td>预约时间</td>
                            <td><?php echo ($orders[0]['pt_trtime']); ?></td>
                        </tr>

                        <tr>
                            <td>兼职者备注</td>
                            <td><?php echo ($orders[0]['pt_inabstract']); ?></td>
                        </tr>

                        </tbody></table>
                    <br/>

                    <button>确认雇佣</button>
                    <button>取消预约</button>
                    <button>取消雇佣</button>（当确认雇佣之后取消雇佣生效）

            </div>
        </div>

    </div>
    <!--/main-->

    <!--/main-->
</div>
</body>
</html>
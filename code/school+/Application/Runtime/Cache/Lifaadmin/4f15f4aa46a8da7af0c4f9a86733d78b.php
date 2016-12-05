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

    <div class="store-wrap">
        <div class="store-title">
            <h1>店铺基本信息</h1>
        </div>
        <div class="store-content">
            <ul class="sys-info-list">
                <li>
                    <label class="res-lab">头像</label><span class="res-info"><img src="/school+/Public/images/logo.png" class="res-labb"/></span>
                    <span class="res-labc"></span>
                </li>

                <li>
                    <label class="res-lab">名称</label><span class="res-info"><?php echo ($store["si_name"]); ?></span>
                    <span class="res-labc"></span>
                </li>
                <li>
                    <label class="res-lab">介绍</label><span class="res-info"><?php echo ($store["si_sintroduce"]); ?></span>
                    <span class="res-labc"></span>
                </li>
                <li>
                    <label class="res-lab">所在地址</label><span class="res-info"><?php echo ($store["si_address"]); ?></span>
                    <span class="res-labc"></span>
                </li>
                <li>
                    <label class="res-lab">联系方式</label><span class="res-info"><?php echo ($store["si_phone"]); ?></span>
                    <span class="res-labc"></span>
                </li>
                <li>
                    <label class="res-lab">主体信息</label><span class="res-info"><?php echo ($type); ?></span>
                    <span class="res-labc"></span>
                </li>
                <!--<a href="seller/changeseller">修改店铺信息</a>-->
                <li>
                    <a href="/school+/Lifaadmin/seller/changeseller"> <input value="修改店铺信息" type="button"></a>

                </li>
            </ul>
        </div>
    </div>


</div>
<!--/main-->



    <!--/main-->
</div>
</body>
</html>
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
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>兼职管理</a>
                    <ul class="sub-menu">
                        <li><a href="addlifa"><i class="icon-font">&#xe008;</i>添加兼职</a></li>
                        <li><a href="managelifa"><i class="icon-font">&#xe004;</i>管理已发布兼职</a></li>
                        <li><a href="dingdan"><i class="icon-font">&#xe004;</i>管理兼职订单</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="result-wrap">
            <div class="result-title">
                <h1>店铺基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">头像</label><span class="res-info"><img src="/school+/Public/images/logo.png" class="res-labb"/></span>
                        <span class="res-labc"></span>
                    </li>
                    <li>
                        <label class="res-lab">二维码</label><span class="res-info"><img src="/school+/Public/images/1.jpg" class="res-labb"/></span>
                        <span class="res-labc"></span>
                    </li>
                    <li>
                        <label class="res-lab">名称</label><span class="res-info">一个柚子</span>
                        <span class="res-labc"></span>
                    </li>
                    <li>
                        <label class="res-lab">介绍</label><span class="res-info">店内环境高端大气上档次，店主良心做饮品，服务大众服务人民</span>
                        <span class="res-labc"></span>
                    </li>
                    <li>
                        <label class="res-lab">所在地址</label><span class="res-info">河北师范大学师生活动中心</span>
                        <span class="res-labc"></span>
                    </li>
                    <li>
                        <label class="res-lab">主体信息</label><span class="res-info">php校园+</span>
                        <span class="res-labc"></span>
                    </li>
                    <!--<a href="seller/changeseller">修改店铺信息</a>-->
                    <li>
                        <a href="/school+/admin/seller/changeseller"> <input value="修改店铺信息" type="button"></a>

                    </li>
                </ul>
            </div>
        </div>


    </div>
    <!--/main-->
</div>
</body>
</html>
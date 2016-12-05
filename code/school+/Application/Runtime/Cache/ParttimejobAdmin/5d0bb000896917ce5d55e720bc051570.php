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
            <div class="crumb-list"><i class="icon-font"></i><span class="crumb-step">&gt;</span><span class="crumb-name">兼职管理</span></div>
        </div>

        <div class="result-wrap">


                <div class="store-wrap">
                    <div class="store-title">
                        <h1>兼职者基本信息</h1>
                    </div>
                    <div class="store-content">
                        <form action="/school+/ParttimejobAdmin/parttimejob/editor" method="post" id="myform" name="myform" enctype="multipart/form-data">
                        <ul class="sys-info-list">
                            <li name="pt_manager_information">
                                <label class="res-lab">兼职发布者姓名</label>
                                <input class="pt_min_name" name="pt_min_name" size="50" value="<?php echo ($pt_manager["pt_min_name"]); ?>" type="text">
                                <span class="res-labc"></span>
                            </li>

                            <li>
                                <label class="res-lab">发表者身份证号</label>
                                <span class="res-info">
                                      <input class="pt_min_idnum" name="pt_min_idnum" size="50" value="<?php echo ($pt_manager["pt_min_idnum"]); ?>" type="text">
                                </span>
                                <span class="res-labc"></span>
                            </li>
                            <li>
                                <label class="res-lab">发表者手机号</label>
                                <span class="res-info">
                                    <input class="pt_min_phone" name="pt_min_phone" size="50" value="<?php echo ($pt_manager["pt_min_phone"]); ?>" type="text">
                                </span>
                                <span class="res-labc"></span>
                            </li>
                            <li>
                                <label class="res-lab">发表者种类</label>
                                <span class="res-info">
                                    <input class="pt_min_type" name="pt_min_type" size="50" value="<?php echo ($pt_manager["pt_min_type"]); ?>" type="text">
                                </span>
                                <span class="res-labc"></span>
                            </li>
                            <li>
                                <label class="res-lab">发表者认证状态</label>
                                <span class="res-info">
                                    <input class="pt_min_app_state" name="pt_min_app_state" size="50" value="<?php echo ($pt_manager["pt_min_app_state"]); ?>" type="text">
                                </span>
                                <span class="res-labc"></span>
                            </li>

                            <!--<a href="seller/changeseller">修改店铺信息</a>-->
                            <li>
                                <input class="btn btn-primary btn6 mr10" value="提交" type="submit" name="submit">
                            </li>
                        </ul>
                            </form>
                    </div>
                </div>
            </div>
    </div>
    <!--/main-->


    <!--/main-->
</div>
</body>
</html>
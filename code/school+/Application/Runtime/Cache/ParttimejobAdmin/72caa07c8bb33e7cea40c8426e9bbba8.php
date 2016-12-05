<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>兼职后台管理</title>
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
            <div class="crumb-list"><i class="icon-font"></i><span class="crumb-step">&gt;</span><a class="crumb-name" href=" ">兼职管理</a><span class="crumb-step">&gt;</span><span>添加兼职</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">

                <form action="/school+/ParttimejobAdmin/parttimejob/addAction" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <!--插入发布者id的隐藏域 就可以添加数据-->
                        <input class="common-text" id="pt_min_id" name="pt_min_id" size="50"  type="hidden" value="<?php echo ($pt_min_id); ?>">

                            <tr>
                                <th><i class="require-red">*</i>兼职名称：</th>
                                <td>
                                    <input class="common-text" id="pt_inname" name="pt_inname" size="50"  type="text" value="">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>兼职报酬：</th>
                                <td>
                                    <input class="common-text" id="pt_inmoney" name="pt_inmoney" size="50"  type="text" value="">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>兼职地址：</th>
                                <td>
                                    <input class="common-text required" id="pt_inaddress" name="pt_inaddress" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>联系人手机号：</th>
                                <td>
                                    <input class="common-text required" id="pt_min_phonee" name="pt_min_phonee" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>兼职内容：</th>
                                <td><textarea  class="common-textarea" id="pt_inabstract" name="pt_inabstract" cols="30" style="width: 98%;" rows="10" value=""></textarea></td>
                            </tr>

                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->

    <!--/main-->
</div>
</body>
</html>
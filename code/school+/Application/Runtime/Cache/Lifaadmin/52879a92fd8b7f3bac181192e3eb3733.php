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
            <div class="crumb-list"><i class="icon-font"></i><a href="">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="">店铺管理</a><span class="crumb-step">&gt;</span><span>店铺信息修改</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/school+/admin/seller/store" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>

                             <tr>
                                 <th><i class="require-red">*</i>头像：</th>
                                 <td><input name="image" id="image" type="file">
                             </tr>
                             <input type="hidden" name="si_id" value="<?php echo ($store["si_id"]); ?>">
                            <tr>
                                <th><i class="require-red">*</i>名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="<?php echo ($store["si_name"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>所在地址：</th>
                                <td><input class="common-text" name="si_address" size="50" value="<?php echo ($store["si_address"]); ?>" type="text"></td>
                            </tr>
                           
                            <tr>
                                <th>介绍：</th>
                                <td><textarea name="si_sintroduce" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10" ><?php echo ($store["si_sintroduce"]); ?></textarea></td>
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
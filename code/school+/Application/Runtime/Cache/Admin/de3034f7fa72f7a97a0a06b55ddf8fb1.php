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
                        <li><a href="addjianzhi"><i class="icon-font">&#xe008;</i>添加兼职</a></li>
                        <li><a href="managejianzhi"><i class="icon-font">&#xe004;</i>管理已发布兼职</a></li>
                        <li><a href="dingdan"><i class="icon-font">&#xe004;</i>管理兼职订单</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><span class="crumb-step">&gt;</span><span class="crumb-name">兼职管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">发布者</option><option value="20">兼职者</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">

                </div>
                <div class="result-content">

                    <table class="result-tab" width="100%">
                        <tr>
                            <th>订单ID</th>
                            <th>预约者姓名</th>
                            <th>预约工作名称</th>
                            <th>预约者联系方式</th>
                            <th>预约时间</th>
                            <th>操作</th>
                        </tr>
                        <tr>
                            <td>1012234</td>
                            <td>张三</td>
                            <td>辅导高三...</td>
                            <td>18733161391</td>
                            <td>周六下午10点.</td>

                            <td>
                                <a class="" href="seedingdan">查看详情</a>
                                <a class="del" href="#">删除</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1012234</td>
                            <td>张三</td>
                            <td>辅导高三...</td>
                            <td>18733161391</td>
                            <td>周六下午10点.</td>

                            <td>
                                <a class="" href="seedingdan">查看详情</a>
                                <a class="del" href="#">删除</a>
                            </td>
                        </tr>
                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->

</div>
</body>
</html>
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
            <div class="crumb-list"><i class="icon-font"></i><span class="crumb-step">&gt;</span><span class="crumb-name">兼职管理</span></div>
        </div>
        <div class="search-wrap">

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
                            <th>兼职简介</th>
                            <th>预约时间</th>
                            <th>操作</th>
                        </tr>

                        <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($vo["pt_trid"]); ?></td>
                            <td><?php echo ($vo["pt_pname"]); ?></td>
                            <td><?php echo ($vo["pt_inname"]); ?></td>
                            <td><?php echo ($vo["pt_pphone"]); ?>
                            <td><?php echo ($vo["pt_inabstract"]); ?></td>
                            <td><?php echo ($vo["pt_trtime"]); ?></td>

                            <td>
                                <a class="" href="view/id/<?php echo ($vo["pt_trid"]); ?>">查看详情</a>
                                <a class="" href="delete/id/<?php echo ($vo["pt_trid"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->

    <!--/main-->
</div>
</body>
</html>
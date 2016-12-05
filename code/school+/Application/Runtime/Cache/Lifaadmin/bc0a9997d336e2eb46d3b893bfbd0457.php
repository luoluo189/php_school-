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
    <!doctype html>
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
                <li><a href="#" target="_blank">网站首页</a></li>
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
                    <a href="#"><i class="icon-font">&#xe003;</i>兼职者管理</a>
                    <ul class="sub-menu">
                        <li><a href="seller/"><i class="icon-font">&#xe008;</i>查看兼职者</a></li>
                        <li><a href="lan/"><i class="icon-font">&#xe004;</i>编辑兼职者</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">兼职管理</span></div>
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
                    <div class="result-list">
                        <a href="insert1.html"><i class="icon-font"></i>新增</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>兼职者ID</th>
                            <th>兼职者昵称</th>
                            <th>兼职者手机号</th>
                            <th>兼职者状态ID</th>
                            <th>兼职者状态名称</th>
                            <th>兼职交易ID</th>
                            <th>可预约时间</th>
                            <th>交易备注</th>
                            <th>操作</th>
                        </tr>


                        <?php if(is_array($jianzhizhe)): $i = 0; $__LIST__ = $jianzhizhe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td><?php echo ($vo["pt_pid"]); ?></td>
                            <td><?php echo ($vo["pt_pname"]); ?></td>
                            <td><?php echo ($vo["pt_pphone"]); ?></td>
                            <td><?php echo ($vo["pt_sid"]); ?></td>
                            <td><?php echo ($vo["pt_sname"]); ?></td>
                            <td><?php echo ($vo["pt_trid"]); ?></td>
                            <td><?php echo ($vo["pt_trtime"]); ?></td>
                            <td><?php echo ($vo["pt_trremark"]); ?></td>
                            <td>
                                <a class="link-update" href="#">修改</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
    <!--/main-->
</div>
</body>
</html>
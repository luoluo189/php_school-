<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/main.css"/>
    <script type="text/javascript" src="/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/Public/home/js/jquery-2.1.4.js"></script>
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
            <h1>评价管理</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>评价信息管理</a>
                    <ul class="sub-menu">
                        <li><a href="/assess/assess/assess"><i class="icon-font">&#xe008;</i>查看评价</a></li>
                        <!--<li><a href="lan/"><i class="icon-font">&#xe004;</i>编辑评价</a></li>-->

                    </ul>
                </li>
                <li>
                    <a href=""><i class="icon-font">&#xe003;</i>发布者信息管理</a>
                    <ul class="sub-menu">
                        <li><a href="/assess/publisher/add"><i class="icon-font">&#xe008;</i>添加发布者</a></li>
                        <li><a href="/assess/publisher/publisher"><i class="icon-font">&#xe004;</i>查看发布者</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>兼职者管理</a>
                    <ul class="sub-menu">
                        <li><a href="/assess/pluralist/pluralist"><i class="icon-font">&#xe008;</i>查看兼职者</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="">首页</a>
                <span class="crumb-step">&gt;</span><span class="crumb-name">兼职者管理</span></div>
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

                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">

                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>

                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th></th>
                            <th>兼职者ID</th>
                            <th>兼职者昵称</th>
                            <th>兼职者手机号</th>
                            <th>兼职者状态</th>
                            <th>兼职交易ID</th>
                            <th>可预约时间</th>
                            <th>交易备注</th>
                            <th>操作</th>
                        </tr>

                        <?php if(is_array($pluralist)): $k = 0; $__LIST__ = $pluralist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>

                                <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                                <td><?php echo ($k); ?></td>
                                <td><?php echo ($vo["pt_pid"]); ?></td>
                                <td><?php echo ($vo["pt_pname"]); ?></td>
                                <td><?php echo ($vo["pt_pphone"]); ?></td>
                                <td><?php echo ($vo["pt_sname"]); ?></td>
                                <td><?php echo ($vo["pt_trid"]); ?></td>
                                <td><?php echo ($vo["pt_trtime"]); ?></td>
                                <td><?php echo ($vo["pt_trremark"]); ?></td>
                                <td>
                                    <a class="view" href="view/id/<?php echo ($vo["pt_pid"]); ?>">查看</a>
                                    <a class="delete" href="delete/id/<?php echo ($vo["pt_pid"]); ?>">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->

<script type="text/javascript">
    $(document).ready(function(){
        console.log('jquery文件引入成功！');
        $(".delete").click(function(){
            var tag = confirm('真的要删除吗？');
            if(!tag){
                return false;
            }
        });
    });

</script>

</div>
</body>
</html>
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
                    <div class="result-list">
                        <a href="add"><i class="icon-font"></i>添加兼职</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>兼职ID</th>
                            <th>兼职名称</th>
                            <th>兼职报酬</th>
                            <th>兼职内容</th>
                            <th>联系方式</th>
                            <th>兼职地址</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($pt_information)): $i = 0; $__LIST__ = $pt_information;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($vo["pt_inid"]); ?></td>
                            <td><?php echo ($vo["pt_inname"]); ?></td>
                            <td><?php echo ($vo["pt_inmoney"]); ?></td>
                            <td><?php echo ($vo["pt_inabstract"]); ?></td>
                            <td><?php echo ($vo["pt_min_phonee"]); ?></td>
                            <td><?php echo ($vo["pt_inaddress"]); ?></td>
                            <td>
                                <a class="" href="edit/id/<?php echo ($vo["pt_inid"]); ?>">修改</a>
                                <a class="delete" href="/school+/index.php/ParttimejobAdmin/Parttimejob/delete/id/<?php echo ($vo["pt_inid"]); ?>">删除</a>
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

    <!--/main-->
</div>
</body>
</html>
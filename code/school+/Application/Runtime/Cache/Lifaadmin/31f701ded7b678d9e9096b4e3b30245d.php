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
            <div class="crumb-list"><i class="icon-font"></i><span class="crumb-step">&gt;</span><span class="crumb-name">兼职管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <!--<form action="/jscss/admin/design/index" method="post">-->
                    <!--<table class="search-tab">-->
                        <!--<tr>-->
                            <!--<th width="120">选择分类:</th>-->
                            <!--<td>-->
                                <!--<select name="search-sort" id="">-->
                                    <!--<option value="">全部</option>-->
                                    <!--<option value="19">发布者</option><option value="20">兼职者</option>-->
                                <!--</select>-->
                            <!--</td>-->
                            <!--<th width="70">关键字:</th>-->
                            <!--<td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>-->
                            <!--<td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>-->
                        <!--</tr>-->
                    <!--</table>-->
                <!--</form>-->
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">

                </div>
                <div class="result-content">

                    <table class="result-tab" width="100%">
                        <tr>
                            <th>预约订单ID</th>
                            <th>预约者姓名</th>
                            <th>预约理发种类</th>
                            <th>预约者联系方式</th>
                            <th>预约时间</th>
                            <th>订单状态</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($dingdans)): $i = 0; $__LIST__ = $dingdans;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($vo["or_tdid"]); ?></td>
                                <td><?php echo ($vo["hair_name"]); ?></td>
                                <td><?php echo ($vo["or_typename"]); ?></td>
                                <td><?php echo ($vo["hair_number"]); ?></td>
                                <td><?php echo ($vo["or_tdtime"]); ?></td>
                                <td><?php echo ($vo["ts_idd"]); ?>
                                    <?php
 switch ($vo["ts_idd"]) { case 1: echo "理发预约取消"; break; case 2: echo "理发预约完成"; break; case 3: echo "理发预约推迟10分钟"; break; default: echo "理发预约进行中"; };?>
                                </td>

                                <td>
                                    <a class="" href="/school+/lifaadmin/lifa/seedingdan?id=<?php echo ($vo["or_tdid"]); ?>">查看详情</a>
                                    <!--<a class="delete" href="" name="<?php echo ($vo["or_tdid"]); ?>">删除</a>-->
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
            //检测js文件是否引入成功
            console.log('恭喜你,jquery文件引入成功');

            $(".delete").click(function(){
                var alarm = confirm('是否确定要删除？');
                confirm(alarm);
                if(alarm == true){
                    var id = $(this).attr('name');
                    confirm(id);

                    //attr()设置被选元素的属性和值。//获取要删除的数据的id
                    var self = $(this);
                    $.post("<?php echo U('lifaadmin/lifa/danDelete');?>",//执行删除操作的页面
                            {'id':id},//删除页面所需要的要删除的数据id

                            function(data){
                                //请求成功后隐藏该记录
                                var child = self.parent().parent();//获取当前结点父结点的父结点
                                child.hide();//隐藏信息

                            }//function(data)处的括号
                    );//post结尾处的括号
                }
            });
        });
    </script>


    <!--/main-->
</div>
</body>
</html>
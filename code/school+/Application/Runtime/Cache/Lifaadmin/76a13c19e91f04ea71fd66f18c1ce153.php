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
            <div class="crumb-list"><i class="icon-font"></i><span class="crumb-step">&gt;</span><span class="crumb-name">理发预约管理</span></div>
        </div>

        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="addji"><i class="icon-font"></i>添加理发预约时间段</a>

                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>理发预约时间段</th>
                            <th>理发预约种类</th>
                            <th>次种类可预约人数</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($store)): $i = 0; $__LIST__ = $store;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

                                <td><?php echo ($vo["ot_pntime"]); ?></td>
                                <td><?php echo ($vo["ot_type"]); ?></td>
                                <td><?php echo ($vo["ot_pnpnum"]); ?></td>
                                <td>
                                    <a  href="/school+/lifaadmin/lifa/changelifa?id=<?php echo ($vo["ot_pnid"]); ?>">修改</a>
                                    <a class="delete" href="" name="<?php echo ($vo["ot_pnid"]); ?>">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
<!--删除的js-->
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
                    $.post("<?php echo U('lifaadmin/lifa/deletelifa');?>",//执行删除操作的页面
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
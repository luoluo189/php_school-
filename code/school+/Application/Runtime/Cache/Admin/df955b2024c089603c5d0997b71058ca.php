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
            <h1 class="topbar-logo none"><a href="index/" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/admin/seller/seller">首页</a></li>
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
            <h1>校园+</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商铺管理</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/seller/seller"><i class="icon-font">&#xe008;</i>管理店铺信息</a></li>
                    </ul>

                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品种类管理</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/lan/addlan"><i class="icon-font">&#xe004;</i>添加种类</a></li>
                        <li><a href="/admin/lan/lan"><i class="icon-font">&#xe006;</i>管理商品种类</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品管理</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/goods/addgds"><i class="icon-font">&#xe005;</i>上传商品信息</a></li>
                        <li><a href="/admin/goods/design"><i class="icon-font">&#xe006;</i>管理商品信息</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>订单管理</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/ding/ding"><i class="icon-font">&#xe012;</i>管理订单信息</a></li>

                   </ul>

                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i>
                <a href="/admin/seller/seller">首页</a><span class="crumb-step">&gt;</span>
                <span class="crumb-name">管理订单</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择交易状态分类:</th>
                            <td>
                                <select name="search-sort" id="dis">
                                    <option value="">全部</option>
                                    <?php if(is_array($tstate)): $i = 0; $__LIST__ = $tstate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ts_name"]); ?>"><?php echo ($vo["ts_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" action="/index.php/Admin/ding/deleteSelected">
                <div class="result-title">
                    <div class="result-list">
                        <button id="batchDel" type="submit"><i class="icon-font"></i>批量删除</button>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="checkbox10" type="checkbox" group="ids"></th>
                            <th>订单交易ID</th>
                            <th>交易用户</th>
                            <th>下单时间</th>
                            <th>交易方式</th>
                            <th>订单状态</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($tstates)): $i = 0; $__LIST__ = $tstates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="id[]" value="<?php echo ($vo["bs_tr_id"]); ?>" type="checkbox"></td>
                            <td><?php echo ($vo["bs_tr_id"]); ?></td>
                            <td><?php echo ($vo["ci_name"]); ?></td>
                            <td><?php echo ($vo["bs_tr_xtime"]); ?></td>
                            <td><?php echo ($vo["bs_tr_way"]); ?></td>
                            <td><?php echo ($vo["ts_name"]); ?></td>

                            <td>
                                <a class="link-view" href="dingview/id/<?php echo ($vo["bs_tr_id"]); ?>">查看</a>
                                <!--<a class="delete" href="/index.php/Admin/Ding/delete/id/<?php echo ($vo["bs_tr_id"]); ?>">删除</a>-->
                                <a class="delete" href="" name="<?php echo ($vo["bs_tr_id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </table>
                    <div class="list-page"><?php echo ($pages); ?></div>
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
                    $.post("<?php echo U('admin/ding/delete/');?>",//执行删除操作的页面
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

</html>
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
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin/seller/seller">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">商品管理</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form action="/jscss/admin/design/index" method="post">
                <table class="search-tab">
                    <tr>
                        <th width="120">选择商品种类:</th>
                        <td>
                            <select name="search-sort" id="catid">
                                <option value="">全部</option>
                                <?php if(is_array($btype)): $i = 0; $__LIST__ = $btype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["bs_tname"]); ?>"><?php echo ($vo["bs_tname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post" action="/index.php/Admin/Goods/destoryBatch">
            <div class="result-title">
                <div class="result-list">
                    <a href="/admin/goods/addgds"><i class="icon-font"></i>新增商品</a>
                    <button id="batchDel" type="submit"><i class="icon-font"></i>批量删除</button>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>商品ID</th>
                        <th>商品名称</th>
                        <th>商品型号(颜色)</th>
                        <th>商品单价</th>
                        <th>商品库存</th>
                        <th>商品图片</th>
                        <th>商品描述</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($bgoods)): $i = 0; $__LIST__ = $bgoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="id[]" value="<?php echo ($vo["bs_gid"]); ?>" type="checkbox"></td>
                            <td><?php echo ($vo["bs_gid"]); ?></td>
                            <td title=""><a target="_blank" href="#" title=""><?php echo ($vo["bs_gname"]); ?></a>
                            </td>
                            <td><?php echo ($vo["bs_gsize"]); ?></td>
                            <td><?php echo ($vo["bs_gprice"]); ?></td>
                            <td><?php echo ($vo["bs_gnumber"]); ?></td>
                            <td>
                                <span class="res-info"><img src="/Public/<?php echo ($vo["bs_gurl"]); ?>" class="res-labb"/></span>
                            </td>
                            <td><?php echo ($vo["bs_gdescription"]); ?></td>
                            <td>
                                <a class="link-update" href="/index.php/Admin/Goods/changegds/id/<?php echo ($vo["bs_gid"]); ?>">修改</a>
                                <a class="delete" href="/index.php/Admin/Goods/delete/id/<?php echo ($vo["bs_gid"]); ?>" >删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <div class="list-page">
                    <?php echo ($pages); ?>
                </div>
            </div>
        </form>
    </div>
</div>
<!--/main-->

<script>
    document.getElementById("1").style.display="none";
    document.getElementById("1").style.display="inline";

    //实现下拉菜单代码
    //$(function () {
    //    $("#catid option:selected").click(function () {
    //        var options=$("#catid option:selected");
    //        var text=alert(options.text());
    //        if ("炒酸奶" ==text){
    //
    //        }
    //    })
    //})
    //    批量删除
    /* 批量删除 */
    // 全选
    //$('.allChoose').click(function() {
    //    if($(this).is(':checked')) {
    //        $(':checkbox').attr('checked', 'checked');
    //    } else {
    //        $(':checkbox').removeAttr('checked');
    //    }
    //});

    // 删除操作
    //$('#batchDel').click(function() {
    //    if($(':checked').size() > 0) {
    //        layer.confirm('确定要删除吗？', {
    //            btn: ['确定','取消'], //按钮
    //            shade: false //不显示遮罩
    //        }, function(){
    //            $.post("<?php echo U('Single/discard');?>", {data: $('form').serializeArray()}, function(res) {
    //                if(res.state == 1) {
    //                    layer.msg(res.message, {icon: 1, time: 1000});
    //                } else {
    //                    layer.msg(res.message, {icon: 2, time: 1000});
    //                }
    //                setTimeout(function() {
    //                    location.reload();
    //                }, 1000);
    //            });
    //        }, function(){
    //            layer.msg('取消了删除！', {time: 1000});
    //        });
    //    } else {
    //        layer.alert('没有选择！');
    //    }
    //});
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
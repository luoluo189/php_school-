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
                <a class="crumb-name" href="/admin/goods/design">商品管理</a>
                <span class="crumb-step">&gt;</span><span>新增商品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/admin/goods/store" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="bs_tname" id="catid" class="required">
                                    <option value="">请选择</option>
                                    <?php if(is_array($btype)): $i = 0; $__LIST__ = $btype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["bs_tname"]); ?>"><?php echo ($vo["bs_tname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="bs_gname" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品型号(颜色)：</th>
                                <td>
                                    <input class="common-text required" id="size" name="bs_gsize" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品单价：</th>
                                <td>
                                    <input class="common-text required" id="price" name="bs_gprice" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品库存：</th>
                                <td>
                                    <input class="common-text required" id="num" name="bs_gnumber" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品图片：</th>
                                <td><input name="bs_gurl" id="" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
                            </tr>
                            <tr>
                                <th>商品描述：</th>
                                <td><textarea name="bs_gdescription" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea></td>
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
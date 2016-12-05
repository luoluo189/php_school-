<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/school+/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/school+/Public/css/main.css"/>
    <script type="text/javascript" src="/school+/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/school+/Public/home/js/jquery-2.1.4.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index/" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/school+/admin/seller/seller">首页</a></li>
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
                        <li><a href="/school+/admin/seller/seller"><i class="icon-font">&#xe008;</i>管理店铺信息</a></li>
                    </ul>

                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品种类管理</a>
                    <ul class="sub-menu">
                        <li><a href="/school+/admin/lan/addlan"><i class="icon-font">&#xe004;</i>添加种类</a></li>
                        <li><a href="/school+/admin/lan/lan"><i class="icon-font">&#xe006;</i>管理商品种类</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品管理</a>
                    <ul class="sub-menu">
                        <li><a href="/school+/admin/goods/addgds"><i class="icon-font">&#xe005;</i>上传商品信息</a></li>
                        <li><a href="/school+/admin/goods/design"><i class="icon-font">&#xe006;</i>管理商品信息</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>订单管理</a>
                    <ul class="sub-menu">
                        <li><a href="/school+/admin/ding/ding"><i class="icon-font">&#xe012;</i>管理订单信息</a></li>

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
                <a class="crumb-name" href="/school+/admin/seller/seller">店铺管理</a>
                <span class="crumb-step">&gt;</span><span>店铺信息修改</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/school+/admin/seller/store?id=<?php echo ($seller["si_id"]); ?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="colId" id="catid" class="required">
                                    <option value="">请选择</option>
                                    <?php if(is_array($sttype)): $i = 0; $__LIST__ = $sttype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["s_type_name"]); ?>"><?php echo ($vo["s_type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <!--<option value="19">水果店</option><option value="20">服装店</option>-->
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>头像：</th>
                                <td><input name="si_image" id="" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
                            </tr>
                                <td type="hidden" name="si_id" value="<?php echo ($seller["si_id"]); ?>"></td>
                            <tr>
                                <th><i class="require-red">*</i>名称：</th>
                                <td>
                                    <input class="common-text required" name="si_name" size="50" value="<?php echo ($seller["si_name"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>所在地址：</th>
                                <td><input class="common-text" name="si_address" size="50" value="<?php echo ($seller["si_address"]); ?>" type="text"></td>
                            </tr>
                            <tr>
                                <th>联系电话：</th>
                                <td><input class="common-text" name="si_phone" size="50" value="<?php echo ($seller["si_phone"]); ?>" type="text"></td>
                            </tr>
                            <tr>
                                <th>介绍：</th>
                                <td><textarea name="si_sintroduce" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"><?php echo ($seller["si_sintroduce"]); ?></textarea></td>
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
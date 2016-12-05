<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>搜索结果</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/school+/Public/home/css/weui.min.css" type="text/css">
    <link rel="stylesheet" href="/school+/Public/home/css/jquery-weui.min.css" type="text/css">

    <style>
        html,body{
            height:100%;
        }
        .back{
            height: 38px;
            padding-top:8px;
        }
        .back{
            margin-top:10px;
            float:left;
        }
        .set{
            width:80%;
            padding-top:15px;
            margin:0 auto;
            text-align:center;
            font-size:22px;
        }
    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_tab_bd">

        <div>
            <!-- 返回图标开始 -->
            <div   class="back" >
                <a href="index.html"><img src="/school+/Public/home/images/back.jpg"  style="width:30px;height:30px;" ></a>
            </div>
            <div class="set">
                美发
            </div>
            <!-- 返回图标结束 -->
        </div>



        <!--搜索框-->
        <div class="weui_search_bar" id="search_bar" style="width:100%;">
            <form class="weui_search_outer">
                <div class="weui_search_inner">
                    <i class="weui_icon_search"></i>
                    <input type="search" class="weui_search_input" id="search_input" placeholder="搜索" required/>
                    <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
                </div>
                <label for="search_input" class="weui_search_text" id="search_text">
                    <i class="weui_icon_search"></i>
                    <span>搜索</span>
                </label>
            </form>
            <a href="javascript:" class="weui_search_cancel" id="search_cancel">取消</a>
        </div>




        <div class="weui_panel weui_panel_access">
            <div class="weui_panel_bd">


                <?php if(is_array($store)): $i = 0; $__LIST__ = $store;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/home/lifa/dianpu/id/<?php echo ($vo["si_id"]); ?>" class="weui_media_box weui_media_appmsg">
                        <div class="weui_media_hd">
                            <img class="weui_media_appmsg_thumb" src="/school+/Public/home/images/meifa2.jpg" alt="">
                        </div>
                        <div class="weui_media_bd">
                            <h4 class="weui_media_title"><?php echo ($vo["si_name"]); ?></h4>
                            <p class="weui_media_desc"><?php echo ($vo["si_sintroduce"]); ?></p>
                            <p class="weui_media_desc">地址：国培大厦一楼</p>
                        </div>
                    </a><?php endforeach; endif; else: echo "" ;endif; ?>





            </div>
        </div>
    </div>

    <div class="weui_tabbar">
        <a href="index.html" class="weui_tabbar_item weui_bar_item_on">
            <div class="weui_tabbar_icon">
                <img src="/school+/Public/home/images/b1.jpg" alt="">
            </div>
            <p class="weui_tabbar_label">首页</p>
        </a>
        <a href="sousuo.html" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="/school+/Public/home/images/b2.jpg" alt="">
            </div>
            <p class="weui_tabbar_label">搜索</p>
        </a>
        <a href="gouwuche.html" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="/school+/Public/home/images/b3.jpg" alt="">
            </div>
            <p class="weui_tabbar_label">购物车</p>
        </a>
        <a href="personal.html" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="/school+/Public/home/images/b4.jpg" alt="">
            </div>
            <p class="weui_tabbar_label">个人中心</p>
        </a>
    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="js/jquery-weui.min.js"></script>
<script>
    $(".swiper-container").swiper({
        loop: true,
        autoplay: 3000
    });
</script>

<style>
    .swiper-container {
        width: 100%;
    }

    .swiper-container img {
        display: block;
        width: 100%;
    }
</style>
</html>
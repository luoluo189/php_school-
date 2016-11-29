<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>商品详情</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="/school+/Public/home/css/weui.min.css" type="text/css" rel="stylesheet">
    <link href="/school+/Public/home/css/jquery-weui.min.css" type="text/css" rel="stylesheet">
    <style>
        html,body{
            height:100%;
        }
        .weui-col-20 img{
            height: 38px;
            padding-top:2px;
            padding-left: 4px;
        }
        .pho img{
            width: 100%;
        }
        .a{
            font-size: 20px;
            padding: 4px;
            color:red;
            float: right;
        }
        .b{
             border: 2px #9c9c9c solid;
             padding-left: 0px;
        }
        .back{
        margin-top:10px;
        float:left;
        }
        .set{
        width:80%;
        padding-top:10px;
        margin:0 auto;
    	text-align:center;
		font-size:22px;
        }

        .dingdan{
            float:right;
            margin-top:-20%;
        }
        .img1{
            margin-top: -20%;
            float:right;
            text-align: center;
        }
        .img2{
            text-align: center;
            margin-top: -12%;
        }
    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_tab_bd">


		    <div>
		    <!-- 返回图标开始 -->
		    <div   class="back" >
		    <a href="dianjia.html"><img src="/school+/Public/home/images/back.jpg"  style="width:30px;height:30px;" ></a>
		    </div>
		    <div class="set">
		    鲜榨果汁
		    </div>
		    <!-- 返回图标结束 -->	
		    </div>

        
        <div class="line">
            <div class="pho">
                <img src="/school+/Public/home/images/meishi1.png"alt="">
            </div>
        </div>
        <div class="a">￥10</div>
        <div>
            <p style="font-size: 20px;padding-left: 8px;">生鲜水果鲜榨</p>
            <p style="font-size: 15px;padding-left: 8px;padding-margin:8px;">运费：免费</p>
        </div>


        <div class="weui_cells weui_cells_access">

            <a class="weui_cell" href="">
                <div class="weui_cell_hd">
                    <p>已选种类：西瓜汁 大杯</p>
                    <p>种类：<span class="b">西瓜汁</span>&nbsp;<span class="b">柠檬汁</span></p>
                    <p>型号：<span class="b">小杯</span>&nbsp;<span class="b">中杯</span>&nbsp;<span class="b">大杯</span></p>

                </div>
                <div class="dingdan">
                    <div class="img1"><img src="/school+/Public/home/images/0.png"  width="60px" height="50px" ></div>
                    <div class="img2"><a href="gouwuche.html"><img src="/school+/Public/home/images/gouwuche.png" alt=""></a></div>
                </div>
            </a>
        </div>


              <div class="weui_panel_bd">
                <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
                  <div class="weui_media_hd">
                    <img class="weui_media_appmsg_thumb" src="/school+/Public/home/images/0.png" alt="">
                  </div>
                  <div class="weui_media_bd">
                    <h4 class="weui_media_title">生鲜水果饮品店</h4>
                    <p class="weui_media_desc">各种饮品大放送</p>
                  </div>
                </a>
            </div>


    <!--底部开始-->
    <!--<div class="weui_tabbar">-->
            <!--<a href="dianjia.html" class="weui_tabbar_item weui_bar_item_on">-->
                <!--<div class="weui_tabbar_icon">-->
                    <!--<img src="/school+/Public/home/images/11.png" alt="">-->
                <!--</div>-->
                <!--<p class="weui_tabbar_label">店铺</p>-->
            <!--</a>-->
            <!--<a href="" class="weui_tabbar_item">-->
                <!--<div class="weui_tabbar_icon">-->
                    <!--<img src="/school+/Public/home/images/22.png" alt="">-->
                <!--</div>-->
                <!--<p class="weui_tabbar_label">收藏</p>-->
            <!--</a>-->
            <!--<a href="" class="weui_tabbar_item">-->
                <!--<div class="weui_tabbar_icon">-->
                    <!--<img src="/school+/Public/home/images/33.png" alt="">-->
                <!--</div>-->
                <!--<p class="weui_tabbar_label">购物车</p>-->
            <!--</a>-->
            <!--<a href="" class="weui_tabbar_item">-->
                <!--<div class="weui_tabbar_icon">-->
                    <!--<img src="/school+/Public/home/images/44.png" alt="">-->
                <!--</div>-->
                <!--<p class="weui_tabbar_label">立即购买</p>-->
            <!--</a>-->
        <!--</div>-->

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
    <!--底部结束-->
</div>
</div>
</body>
<script type="text/javascript" src="/school+/Public/home/js/jquery-2.1.4.js" ></script>
<script type="text/javascript" src="/school+/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript">
    $(".weui_navbar .weui_navbar_item").click(function(){
        $(".weui_navbar .weui_navbar_item").removeClass("weui_bar_item_on");//全部没有weui_bar_item_on
        $(this).addClass("weui_bar_item_on");//点谁谁有weui_bar_item_on
        //判断点的第几个选项卡
        var which = $(this).index();
        //console.log(which);
        //让所有内容区域隐藏
        $(".weui_tab_bd .content").hide();
        //按照索引选择内容
        $(".weui_tab_bd .content:eq("+which+")").show();
    });
</script>
</html>
<?php if (!defined('THINK_PATH')) exit();?>
	<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>店家</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="/school+/Public/home/css/weui.min.css" type="text/css" rel="stylesheet">
    <link href="/school+/Public/home/css/jquery-weui.min.css" type="text/css" rel="stylesheet">
    
    <style>
        html,body{
            height:100%;
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
		font-size:26px;
        }
        .top{
            float: left;
            margin-left: 10%;

        }
        .top img{
            margin-left:22%;
            border-radius: 40px;
        }
        .f{
            margin-top: -10px;
            text-align: center;
            font-family: 隶书;
            font-size: 14px;
        }
        .littletitle{
            width:80%;
            height:10%;
            margin:0 auto;
        }
        .neirong{
            float:right;
            margin-left:0;
        }
        .neirong{
            float:right;
            width:60%;
            margin-top: 7%;
        }
        .yinpin{
            width:100px;
            height: 100px;
            margin-top:6%;
            margin-left: 6%;
        }
    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_tab_bd">

		    <div>
		    <!-- 返回图标开始 -->
		    <div   class="back" >
		    <a href="<?php echo U('home/dianjia/shangjia');?>"><img src="/school+/Public/home/images/back.jpg"  style="width:30px;height:30px;" ></a>
		    </div>
		    <div class="set">
		    一个柚子饮品店
		    </div>
		    <!-- 返回图标结束 -->	
		    </div>


        <div class="titleimage">
        <img src="/school+/Public/home/images/yinpindian.jpg" style="width:100%;">
        </div>


        <!--中间小标题部分开始-->
        <div   class="littletitle">
            <a class="top" href="<?php echo U('home/dianjia/jianjie');?>">
                <div><img src="/school+/Public/home/images/51.png" alt=""></div>
                <div class="f">本店简介</div>
            </a>
            <a class="top" href="<?php echo U('home/dianjia/shangpin');?>">
                <div><img src="/school+/Public/home/images/52.png" alt=""></div>
                <div class="f">店家推荐</div>
            </a>
            <a class="top" href="<?php echo U('home/dianjia/pingjia');?>">
                <div><img src="/school+/Public/home/images/53.png" alt=""></div>
                <div class="f">顾客风评</div>
            </a>
        </div>

        <!--中间小标题部分结束-->

        <!--主体部分开始-->

        <div class="content" >
            <?php if(is_array($bs_goods)): $i = 0; $__LIST__ = $bs_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="weui_cells weui_cells_access">
                        <a href="<?php echo U('home/dianjia/shangpin');?>"><img src="/school+/Public/home/images/yinpin.jpg"  class="yinpin"></a>
                        <div class="neirong">
                            <?php echo ($vo['bs_gname']); ?><br/>
                            价格：<?php echo ($vo['bs_gprice']); ?><br/>
                            <?php echo ($vo['bs_gsize']); ?><br/>
                            <a href="gouwuche-queren.html"><img src="/school+/Public/home/images/gouwuche.png" style="float:right;"></a>
                        </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!--主体部分结束-->


    <!--底部开始-->
    <!--<div class="weui_tabbar">-->
            <!--<a href="index.html" class="weui_tabbar_item weui_bar_item_on">-->
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
            <!--<a href="gouwuche.html" class="weui_tabbar_item">-->
                <!--<div class="weui_tabbar_icon">-->
                    <!--<img src="/school+/Public/home/images/33.png" alt="">-->
                <!--</div>-->
                <!--<p class="weui_tabbar_label">购物车</p>-->
            <!--</a>-->
            <!--<a href="personal.html" class="weui_tabbar_item">-->
                <!--<div class="weui_tabbar_icon">-->
                    <!--<img src="/school+/Public/home/images/44.png" alt="">-->
                <!--</div>-->
                <!--<p class="weui_tabbar_label">立即购买</p>-->
            <!--</a>-->
        <!--</div>-->


    <!--底部结束-->

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


	<!--底部开始-->
	<div class="weui_tabbar">
		<a href="index.html" class="weui_tabbar_item ">
			<div class="weui_tabbar_icon">
				<img src="/school+/Public/home/images/b1.jpg" alt="">
			</div>
			<p class="weui_tabbar_label">主页</p>
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
</body>
<script type="text/javascript" src="js/jquery-2.1.4.js" ></script>
<script type="text/javascript" src="js/jquery-weui.min.js"></script>
<script type="text/javascript" src="js/swiper.js" charset="utf-8"></script>
<script>
	$(".swiper-container").swiper({
		loop: true,
		autoplay: 3000
	});
</script>
</html>
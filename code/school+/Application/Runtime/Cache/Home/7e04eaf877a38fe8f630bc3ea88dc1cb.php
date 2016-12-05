<?php if (!defined('THINK_PATH')) exit();?>
	<!DOCTYPE html>
<html>
<head>
    <title>店家简介</title>
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
        .ap{
            text-align: center;
        }
        .text p{
            font-size: 10px;
            margin-top: 10px;
            margin-left: 13px;
            margin-right: 13px;
            margin-bottom: 10px;
        }
        .t1{
            width: 100%;
            float: left;
        }
        .top1{
            float: left;
            margin-top: 2%;
            width: 25%;
        }
        .im{
            text-align: center;
        }
        .top1 img{
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        .f1{
            margin-top: -10px;
            text-align: center;
            font-family: 隶书;
            font-size: 16px;
        }
        .t2{
            width: 100%;
            float: left;
            background-color: #EEEEEE;
        }
        .t2 p{
            text-align: center;
            font-size: 12px;
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
    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_tab_bd">


        <div>
            <!-- 返回图标开始 -->
            <div   class="back" >
                <a href="lifa-dianpu.html"><img src="/school+/Public/home/images/back.jpg"  style="width:30px;height:30px;" ></a>
            </div>
            <div class="set">
                本店简介
            </div>
            <!-- 返回图标结束 -->
        </div>


        <div class="pho">
            <img src="/school+/Public/home/images/meishi1.png"alt="">
        </div>
        <div class="ap">
            本店简介
        </div>
        <hr/>
        <div class="text" name="text">
            <p> <?php echo ($text['si_sintroduce']); ?></p>
        </div>
        <hr/>
        <div class="ap">
           商品分类
        </div>
        <hr/>
        <div class="t1">
            <?php if(is_array($bs_type)): $i = 0; $__LIST__ = $bs_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="top1" href="<?php echo U('home/dianjia/shangpin');?>">
                <div class="im"><img src="/school+/Public/home/images/guozhi.jpg" alt=""></div>
                <div class="f1"><?php echo ($vo['bs_tname']); ?></div>
            </a><?php endforeach; endif; else: echo "" ;endif; ?>


        </div>
        <hr/>
        <div class="t2">
            <p>地址：{si_address}</p>
            <p>营业时间：{si_stime}~{si_etime}</p>
            <p>联系方式：<?php echo ($type2["si_phone"]); ?></p>
        </div>
    </div>

    <!--底部开始-->

    <!--底部结束-->

<script type="text/javascript" src="/school+/Public/home/js/jquery-2.1.4.js" ></script>
<script type="text/javascript" src="/school+/Public/home/js/jquery-weui.min.js"></script>



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
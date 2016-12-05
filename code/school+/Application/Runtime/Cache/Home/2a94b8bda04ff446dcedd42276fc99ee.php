<?php if (!defined('THINK_PATH')) exit();?>
	<!DOCTYPE html>
<html>
<head>
	<title>校园+</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="/school+/Public/home/css/weui.min.css" type="text/css" rel="stylesheet">
	<link href="/school+/Public/home/css/jquery-weui.min.css" type="text/css" rel="stylesheet">
	<style>
		html,body{
			height:100%;
		}
		.swiper-container {
			width: 100%;
			/*margin-top:2%;*/
		}
		.swiper-container img {
			display: block;
			width:100%;
			
		}
		.t{
			width:100%;
			padding-top: 10px;
			float: left;
			/*
			background-image:url("images/bg.jpg");
			background-size:100% 100%;
			*/
		}
		.top{
			float: left;
			margin-left: 4%;
			margin-right: 4%;
			width: 40%;
		}
		.imgs{
			text-align: center;
		}
		.top img{
			width:100%;
			border-radius: 20%;
			text-align: center;
		}
		.f {
			margin-top: -10px;
			text-align: center;
			font-family: 隶书;
			font-size: 15px;
			color: #007aff;
			text-shadow: 2px 2px 2px #cc7acc;
		}
	</style>
</head>
<body>
<div class="weui_tab">

	<div class="weui_tab_bd">
		<!--<div class="weui-row weui-no-gutter" >-->
			<!--<div class="weui-col-60"  style="font-size: 30px;padding-top: 8px; margin: 0 auto;text-align:center;" >校园+</div>-->
		<!--</div>-->
		
		
		<!--顶部幻灯片开始-->
		<div class="swiper-container" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="1000">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="/school+/Public/home/images/t1.png" alt=""></div>
				<div class="swiper-slide"><img src="/school+/Public/home/images/t2.png" alt=""></div>
				<div class="swiper-slide"><img src="/school+/Public/home/images/t3.png" alt=""></div>
				<div class="swiper-slide"><img src="/school+/Public/home/images/t4.png" alt=""></div>
			</div>
			<!-- If we need pagination -->
			<div class="swiper-pagination"></div>
		</div>
		<!--顶部幻灯片结束-->

			<div class="t">
				<a class="top" href="/school+/home/dianjia/shangjia">
					<div class="imgs"><img src="/school+/Public/home/images/shouye1.png" alt="" ></div>
					<div class="f">校园生活</div>
				</a>
				<a class="top" href="/school+/home/dianjia/meishi">
					<div class="imgs"><img src="/school+/Public/home/images/shouye2.png" alt=""></div>
					<div class="f">校园美食</div>
				</a>

				<a class="top" href="/school+/home/lifa/llist">
					<div class="imgs"><img src="/school+/Public/home/images/shouye3.png" alt=""></div>
					<div class="f">美发预约</div>
				</a>
				<a class="top" href="/school+/home/jianzhi/jianzhi">
					<div class="imgs"><img src="/school+/Public/home/images/shouye4.png" alt=""></div>
					<div class="f">校园兼职</div>
				</a>
			</div>

	</div>

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
		<a href="/school+/home/personal/personal/id/1" class="weui_tabbar_item">
			<div class="weui_tabbar_icon">
				<img src="/school+/Public/home/images/b4.jpg" alt="">
			</div>
			<p class="weui_tabbar_label">个人中心</p>
		</a>
	</div>
	<!--底部结束-->
</div>
</body>
<script type="text/javascript" src="/school+/Public/home/js/jquery-2.1.4.js" ></script>
<script type="text/javascript" src="/school+/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="/school+/Public/home/js/swiper.js" charset="utf-8"></script>
<script>
	$(".swiper-container").swiper({
		loop: true,
		autoplay: 3000
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
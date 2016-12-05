<?php if (!defined('THINK_PATH')) exit();?>
	<!DOCTYPE html>
<html>
<head>
	<title>兼职</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"><!--只有IE8认识,解决兼容性问题-->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="/school+/Public/home/css/weui.min.css" type="text/css" rel="stylesheet">
	<link href="/school+/Public/home/css/jquery-weui.min.css" type="text/css" rel="stylesheet">
	<style>
		html,body{
			height:100%;
		}
		.swiper-container img {
			display: block;
			width: 100%;
		}
		.con{
			width:100%;
			height:10%;
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
		.tb
		{
			border-collapse:collapse;
			border-style:solid;
		}
		td
		{
			border-width:2px;
			border-collapse:collapse;
			border-color: #c9c9c9;
			border-style:solid;
			text-align: center;
		}
		.table{
			margin-top:10px;
		}

		.screen{
			margin-top:10px;
		}
	</style>
</head>
<body>
<div class="weui_tab">
	<div class="weui_tab_bd">
		<div class="con">
		

		    <div>
		    <!-- 返回图标开始 -->
		    <div   class="back" >
		    <a href="index.html"><img src="/school+/Public/home/images/back.jpg"  style="width:30px;height:30px;" ></a>
		    </div>
		    <div class="set">
		    兼职首页
		    </div>
		    <!-- 返回图标结束 -->	
		    </div>
        

		</div>




		<div class="weui_search_bar" id="search_bar">
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




	<div class="screen">
		&nbsp;您还可以按条件筛选（请选择筛选条件）：<br/>
		<div style="margin-top:8px;margin-left:3%;">

		<input type="text" id='picker1' style="width:22%;height:24px;" value="高中数学"/>
		<input type="text" id='picker2' style="width:13%;height:24px;" value="周一"/>
		<input type="text" id='picker3' style="width:13%;height:24px;" value="下午"/>
		<input type="text" id='picker4' style="width:25%;height:24px;" value="50~100/小时"/>
		<div  style="float: right;height:10%;">
		<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">确认</a>
		</div>

		</div>
	</div>


		<!-- 主体部分开始 -->

		<div  class="table">
			<table width="100%"  border="2" cellpadding="0" cellspacing="0" class="tb">
				<tr>
					<td>名称</td>
					<td>时间</td>
					<td>工资</td>
				</tr>
				<tr>

					<td><a href="<?php echo U('home/jianzhi/jianzhi_content');?>">高中物理</a></td>
					<td>周六日</td>
					<td>20元/小时</td>

				</tr>

				<tr>
					<td><a href="jianzhi-content.html">高中数学</a></td>
					<td>周六日</td>
					<td>20元/小时</td>
				</tr>
				<tr>
					<td><a href="jianzhi-content.html">高中化学</a></td>
					<td>周六日</td>
					<td>20元/小时</td>
				</tr>
				<tr>
					<td><a href="jianzhi-content.html">高中英语</a></td>
					<td>周六日</td>
					<td>20元/小时</td>
				</tr>
				<tr>
					<td><a href="jianzhi-content.html">高中生物</a></td>
					<td>周六日</td>
					<td>20元/小时</td>
				</tr>
			</table>
		</div>


		<!-- 主体部分结束 -->

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
<script type="text/javascript" src="/school+/Public/home/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/school+/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="/school+/Public/home/js/jquery-weui.js"></script>
<script type="text/javascript" src="/school+/Public/home/js/swiper.js"></script>
<script>
	$("#picker1").picker({
		title: "请选择兼职类型",
		cols: [
			{
				textAlign: 'center',
				values: ['高中数学', '高中化学', '高中英语']
			}
		]
	});
	$("#picker2").picker({
		title: "请选择兼职时间",
		cols: [
			{
				textAlign: 'center',
				values: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
			}
		]
	});
	$("#picker3").picker({
		title: "请选择兼职时间",
		cols: [
			{
				textAlign: 'center',
				values: ['上午', '下午', '晚上']
			}
		]
	});
	$("#picker4").picker({
		title: "请选择您理想的工资",
		cols: [
			{
				textAlign: 'center',
				values: ['25~50/小时', '30~55/小时', '40~65/小时']
			}
		]
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
<?php if (!defined('THINK_PATH')) exit();?>
	<!DOCTYPE html>
<html>
<head>
    <title>美发预约</title>
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
        .pt{
            margin-left: 10px;
        }
        .submit{
            width:80px ;
            height: 30px;
            float: right;
            margin-right: 15px;
            margin-top: 10px;
            margin-bottom: 5px;
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
		    <a href="/school+/home/lifa/dianpu/si_id/<?php echo ($set["si_id"]); ?>"><img src="/school+/Public/home/images/back.jpg"  style="width:30px;height:30px;" ></a>
		    </div>
		    <div class="set" name="set">
		   <?php echo ($set["si_name"]); ?>预约
		    </div>
		    <!-- 返回图标结束 -->	
		    </div>

        
        <div class="pho">
            <img src="/school+/Public/home/images/5.png"alt="">
        </div>
        <p class="pt">请填写您的信息：</p>
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">姓名：</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="text" placeholder="请输入姓名">
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">性别：</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input type="radio" name="sex" value="男">男<input type="radio" name="sex" value="女">女
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">联系方式：</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="tel" placeholder="请输入您的手机号">
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">选择您的头发长度：</label></div>
                <div class="weui_cell_bd ">
                    <input type="radio" name="hair" value="短发">短发
                    <input type="radio" name="hair" value="中长发">中长发
                    <input type="radio" name="hair" value="长发">长发
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label class="weui_label">选择您的服务类型：</label></div>
                <div class="weui_cell_bd ">
                    <input type="checkbox" name="hair" value="剪发">剪发
                    <input type="checkbox" name="hair" value="烫发">烫发
                    <input type="checkbox" name="hair" value="染发">染发
                    <input type="checkbox" name="hair" value="拉直">拉直
                    <input type="checkbox" name="hair" value="造型设计">造型设计
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">预约日期：</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="date" value="">
                </div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">预约时间：</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input type="radio" name="hair" value="">9:00-11:30&nbsp;&nbsp;
                    <input type="radio" name="hair" value="">13:00-15:00<br/>
                    <input type="radio" name="hair" value="">16:00-18:00
                    <input type="radio" name="hair" value="">19:00-21:00
                </div>
            </div>
        </div>
        <div class="weui_cells_title">备注</div>
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <textarea class="weui_textarea" placeholder="请输入备注" rows="2"></textarea>
                    <div class="weui_textarea_counter"><span>0</span>/200</div>
                </div>
            </div>
        </div>
        <input type="submit" class="submit" value="提交">
    </div>

    <!--底部开始-->
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
</body>
<script type="text/javascript" src="/school+/Public/home/lib/jquery-2.1.4.js" ></script>
<script type="text/javascript" src="/school+/Public/home/js/jquery-weui.min.js"></script>

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
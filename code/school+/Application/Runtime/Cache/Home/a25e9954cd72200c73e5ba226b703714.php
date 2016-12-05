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
        .weui-col-20 img{
            height: 38px;
            padding-top:2px;
            padding-left: 4px;
        }
        .weui_panel_hd{
            width: 100%;
            float: left;
        }
        .ab p{
            padding-left: 20px;
        }
        .sp{
            margin-top: 5px;
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
		    <?php echo ($set["si_name"]); ?>风评
		    </div>
		    <!-- 返回图标结束 -->	
		    </div>
        
		    
		    
        <div class="weui_panel weui_panel_access">
            <div class="weui_panel_hd">
                <div>综合评价：4.8分</div>
                <!--<div class="ab">-->
                    <!--<p>服务态度：5分</p>-->
                    <!--<p>服务环境：4.6分</p>-->
                    <!--<p>服务效率：4.8</p>-->
                <!--</div>-->
            </div>
            <div class="weui_panel_bd">
              <?php if(is_array($set)): $i = 0; $__LIST__ = $set;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="weui_media_box weui_media_text">
                    <div>
                        <img src="/school+/Public/home/images/54.png" style="border-radius: 50%" width="25px" height="25px">
                        <span style="padding-left: 10px">用户1</span>
                    </div>
                    <div class="sp">
                        <p class="weui_media_desc">服务周到，很好，下次再来</p>
                        <div class="weui_media_info">
                            <div class="weui_media_info_meta">浏览10次</div>
                            <!--<div class="weui_media_info_metas ">点赞-->
                            <!--<img src="images/55.png" width="17px" height="17px" class="tp">-->
                            <!--</div>-->
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

                <div class="weui_media_box weui_media_text">
                    <div>
                        <img src="/school+/Public/home/images/54.png" style="border-radius: 50%" width="25px" height="25px">
                        <span style="padding-left: 10px">用户2</span>
                    </div>
                    <div class="sp">
                        <p class="weui_media_desc">服务周到，很好，下次再来</p>
                        <div class="weui_media_info">
                            <div class="weui_media_info_meta">浏览10次</div>
                            <!--<div class="weui_media_info_metas ">点赞-->
                                <!--<img src="images/55.png" width="17px" height="17px">-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
                <div class="weui_media_box weui_media_text">
                    <div>
                        <img src="/school+/Public/home/images/54.png" style="border-radius: 50%" width="25px" height="25px">
                        <span style="padding-left: 10px">用户3</span>
                    </div>
                    <div class="sp">
                        <p class="weui_media_desc">服务周到，很好，下次再来</p>
                        <div class="weui_media_info">
                            <div class="weui_media_info_meta">浏览10次</div>
                            <!--<div class="weui_media_info_metas ">点赞-->
                                <!--<img src="images/55.png" width="17px" height="17px">-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
                <div class="weui_media_box weui_media_text">
                    <div>
                        <img src="/school+/Public/home/images/54.png" style="border-radius: 50%" width="25px" height="25px">
                        <span style="padding-left: 10px">用户4</span>
                    </div>
                    <div class="sp">
                        <p class="weui_media_desc">服务周到，很好，下次再来</p>
                        <div class="weui_media_info">
                            <div class="weui_media_info_meta">浏览10次</div>
                            <!--<div class="weui_media_info_metas ">点赞-->
                                <!--<img src="images/55.png" width="17px" height="17px">-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>

        </div>


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
<script type="text/javascript" src="js/jquery-2.1.4.js" ></script>
<script type="text/javascript" src="js/jquery-weui.min.js"></script>
<script type="text/javascript">
    $(".weui_media_info_metas").click(function(){
        $("tp").css();
    })

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
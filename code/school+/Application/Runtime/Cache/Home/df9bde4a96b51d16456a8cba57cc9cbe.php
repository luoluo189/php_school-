<?php if (!defined('THINK_PATH')) exit();?>
	<!DOCTYPE html>
<html>
<head>
	<title>全部订单</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"><!--只有IE8认识,解决兼容性问题-->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="/school+/Public/home/css/weui.min.css" type="text/css" rel="stylesheet">
	<link href="/school+/Public/home/css/jquery-weui.min.css" type="text/css" rel="stylesheet">
	<style>
		html,body{
			height:100%;
		}
        .weui_tab .weui_tab_bd .content img{
            width:100%;
            display:block;
        }
       .dingdanneirong{
        float:left;
        width:80%;
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
		    <a href="<?php echo U('home/index/index');?>"><img src="/school+/Public/home/images/back.jpg"  style="width:30px;height:30px;" ></a>
		    </div>
		    <div class="set">
		    全部订单
		    </div>
		    <!-- 返回图标结束 -->	
		    </div>
        

		<!-- 中间部分开始 -->
		 <div class="weui_tab_bd">
         <!--导航栏开始-->
        <div class="weui_tab">
            <div class="weui_navbar"  >
                <a class="weui_navbar_item weui_bar_item_on"  >最新订单</a>
                <a class="weui_navbar_item"  >商品预约</a>
                <a class="weui_navbar_item"   >兼职</a>
                 <a class="weui_navbar_item"  >理发预约</a>
                 <a class="weui_navbar_item"   >已完成</a>
            </div>
            <div class="weui_tab_bd">
                <!--选项卡开始-->
                <div class="weui_tab_bd" >
                    <!--第1个选项卡开始-->
                    <div class="content" >
                        <div class="weui_cells weui_cells_access">
                        
                             <a class="weui_cell" href="lifa-dianpu.html">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/lifa.jpg"  style="width:80%;">
							    </div>
							    <div class="dingdanneirong">
							      蓝调理发店<br/>
							      预约类型：烫染大卷<br/>
							      发型：中长发<br/>
							      预约时间：2016-11-19&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>							     
							      *1					      
							    </div>						    
							  </a>	
							  
								<div class="weui_cells">
								    <div class="weui_cell" style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								
								    <div class="weui_cell"  style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary" >
								    
								    
								    <div class="button_sp_area"  style=" float:right;margin-bottom:1%;">

									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">延长收货</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">预约成功</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">确认收货</a>
									</div>	
									
									
															   
								    </div>								    
								   </div>  
								   
								</div>
								
								
								<a class="weui_cell" href="dianjia.html">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/meishi.jpg"  style="width:80%; ">
							    </div>
							    <div class="dingdanneirong">
							      一个柚子饮品店<br/>
							      商品：西瓜汁（大杯）<br/>
							      送货地址：启智园3号楼<br/>
							     预计到达：2016-11-19&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>
							      *1						      
							    </div>						    
							  </a>		  
								<div class="weui_cells">
								    <div class="weui_cell" style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								
								    <div class="weui_cell"  style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary">
										<div class="button_sp_area"  style=" float:right;margin-bottom:1%;">

									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">延长收货</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">预约成功</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">确认收货</a>
									</div>	
																   
								    </div>								    
								   </div>  
								   
								 </div>

                        </div>
                    </div>
                    <!--第1个选项卡结束-->
                    
                    <!--第2个选项卡-->
                    <div class="content" style="display:none">
                        <div class="weui_cells weui_cells_access">
                        
                        		<a class="weui_cell" href="dianjia.html">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/meishi.jpg"  style="width:80%; ">
							    </div>
							    <div class="dingdanneirong">
							      一个柚子饮品店<br/>
							      商品：西瓜汁（大杯）<br/>
							      送货地址：河北师范大学启智园3号楼<br/>
							     预计到达：&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>
							      *1<br/>							      
							    </div>						    
							  </a>		  
								<div class="weui_cells">
								    <div class="weui_cell" style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								    
								    <div class="weui_cell"  style="height:20px;">
								   
								    <div class="weui_cell_bd weui_cell_primary">

										<div class="button_sp_area"  style=" float:right;margin-bottom:1%;">
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">延长收货</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">预约成功</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">确认收货</a>
									 </div>	
									 			   
								    </div>								    
								   </div>  
								   
								</div>
								
								<a class="weui_cell" href="dianjia.html">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/meishi.jpg"  style="width:80%; ">
							    </div>
							    <div class="dingdanneirong">
							      一个柚子饮品店<br/>
							      商品：西瓜汁（大杯）<br/>
							      送货地址：河北师范大学启智园3号楼<br/>
							     预计到达：&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>
							      *1<br/>							      
							    </div>						    
							  </a>		  
								<div class="weui_cells">
								    <div class="weui_cell"  style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								    
								    <div class="weui_cell"  style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary" >
									  <div class="button_sp_area"  style=" float:right;margin-bottom:1%;">
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">延长收货</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">预约成功</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">确认收货</a>
									 </div>	
								    								   
								    </div>								    
								   </div>  
								</div>
								
                        </div>
                    </div>
                    
                    
                    
                    <!--第3个选项卡-->
					<div class="content" style="display:none">
						<div class="weui_cells weui_cells_access">

							<a class="weui_cell" href="javascript:;">
								<div class="weui_cell_hd" >
									<img src="/school+/Public/home/images/jianzhi.png"   style="width:80%; ">
								</div>
								<div class="dingdanneirong">
									兼职物理老师<br/>
									工资：100元/天<br/>
									时间：2016-11-12&nbsp;&nbsp;13:30<br/>
								</div>
							</a>
							<div class="weui_cells">
								<div class="weui_cell"  style="height:30px;">
									<div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; left:0;">
										备注：有工作经验 &nbsp;&nbsp; 联系方式：187331547834
										<br/>
										微信：weixin
									</div>
								</div>

								<div class="weui_cell"  style="height:20px;">
									<div class="weui_cell_bd weui_cell_primary" >
										<div class="button_sp_area"  style=" float:right;margin-bottom:1%;">
										<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">等待录取</a>
										<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">预约成功</a>
										<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default"  id="canceljianzhi">取消预约</a>
									</div>
										</div>
								</div>
							</div>

							<a class="weui_cell" href="javascript:;">
								<div class="weui_cell_hd" >
									<img src="/school+/Public/home/images/jianzhi.png"  style="width:80%; " >
								</div>
								<div class="dingdanneirong">
									兼职物理老师<br/>
									工资：100元/天<br/>
									时间：2016-11-12&nbsp;&nbsp;13:30<br/>
								</div>
							</a>
							<div class="weui_cells">
								<div class="weui_cell"  style="height:30px;">
									<div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; left:0;">
										备注：有工作经验 &nbsp;&nbsp; 联系方式：187331547834
										<br/>
										微信：weixin
									</div>
								</div>

								<div class="weui_cell"  style="height:30px;">
									<div class="weui_cell_bd weui_cell_primary">
										<div class="button_sp_area"  style=" float:right;margin-bottom:1%;">
										<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">订单完成</a>
										<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">雇佣成功</a>
										<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default"  id="cancelemploy">取消雇佣</a>
									</div>
								 </div>



								</div>
							</div>


							<a class="weui_cell" href="javascript:;">
								<div class="weui_cell_hd" >
									<img src="/school+/Public/home/images/jianzhi.png"   style="width:80%; ">
								</div>
								<div class="dingdanneirong">
									兼职物理老师<br/>
									工资：100元/天<br/>
									时间：2016-11-12&nbsp;&nbsp;13:30<br/>
								</div>
							</a>
							<div class="weui_cells">
								<div class="weui_cell"  style="height:30px;">
									<div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; left:0;">
										备注：有工作经验 &nbsp;&nbsp; 联系方式：187331547834
										<br/>
										微信：weixin
									</div>
								</div>

								<div class="weui_cell"  style="height:20px;">
									<div class="weui_cell_bd weui_cell_primary">
										<div class="button_sp_area"  style=" float:right;">

										<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">取消雇佣</a>
											</div>

									</div>
								</div>
							</div>

						</div>
					</div>

                    <!--第4个选项卡-->
                    <div class="content" style="display:none">
                        <div class="weui_cells weui_cells_access">
                        
                               <a class="weui_cell" href="lifa-dianpu.html">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/meifa1.jpg"   style="width:80%; ">
							    </div>
							    <div class="dingdanneirong">
							      蓝调理发店<br/>
							      预约类型：烫染大卷<br/>
							      发型：中长发<br/>
							      预约时间：2016-11-12&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>
							      *1<br/>							      
							    </div>						    
							  </a>		  
								<div class="weui_cells">
								    <div class="weui_cell"   style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								
								    <div class="weui_cell"    style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary" >

										<div class="button_sp_area"  style=" float:right;margin-bottom:1%;">
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">迟到十分钟</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">联系店家</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">取消预约</a>
									 </div>	
									 
									 
								    </div>
								   </div>  
								</div>
								
								  <a class="weui_cell" href="lifa-dianpu.html">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/meifa2.jpg"   style="width:80%; ">
							    </div>
							    <div class="dingdanneirong">
							      蓝调理发店<br/>
							      预约类型：烫染大卷<br/>
							      发型：中长发<br/>
							      预约时间：2016-11-12&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>
							      *1<br/>							      
							    </div>						    
							  </a>		  
								<div class="weui_cells">
								    <div class="weui_cell"   style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								
								    <div class="weui_cell"   style="height:20px;" >
								    <div class="weui_cell_bd weui_cell_primary">

										<div class="button_sp_area"  style=" float:right;margin-bottom:1%;">
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">订单已取消</a>
									  <a href="personal-comment.html" class="weui_btn weui_btn_mini weui_btn_default">评价订单</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">删除订单</a>
									 </div>	
									 
								    
								    </div>
								   </div>  
								</div>
								
								
							<a class="weui_cell" href="lifa-dianpu.html">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/lifa.jpg"   style="width:80%; ">
							    </div>
							    <div class="dingdanneirong">
							      蓝调理发店<br/>
							      预约类型：烫染大卷<br/>
							      发型：中长发<br/>
							      预约时间：2016-11-12&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>
							      *1<br/>		
							      <div style="color:red;">推迟时间：迟到十分钟</div>			      
							    </div>						    
							  </a>		  
								<div class="weui_cells">
								    <div class="weui_cell"   style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								

								</div>

                        </div>
                    </div>
                    
                    
                    
                     <!--第5个选项卡-->
                    <div class="content" style="display:none">
                        <div class="weui_cells weui_cells_access">
                          <a class="weui_cell" href="javascript:;">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/lifa.jpg"   style="width:80%; ">
							    </div>
							    <div class="dingdanneirong">
							      蓝调理发店<br/>
							      预约类型：烫染大卷<br/>
							      发型：中长发<br/>
							      预约时间：2016-11-12&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>
							      *1						      
							    </div>						    
							  </a>		  
								<div class="weui_cells">
								    <div class="weui_cell"  style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								
								    <div class="weui_cell"   style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary">


									<div class="button_sp_area"  style=" float:right;margin-bottom:1%;">
									  <a href="<?php echo U('home/dingdan/personal_comment');?>" class="weui_btn weui_btn_mini weui_btn_default">评价订单</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">删除订单</a>
									 </div>	
									 
								    </div>
								   </div>  
								</div>
                        
                          <a class="weui_cell" href="javascript:;">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/meifa2.jpg"   style="width:80%; ">
							    </div>
							    <div class="dingdanneirong">
							      蓝调理发店<br/>
							      预约类型：烫染大卷<br/>
							      发型：中长发<br/>
							      预约时间：2016-11-12&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>
							      *1<br/>							      
							    </div>						    
							  </a>		  
								<div class="weui_cells">
								    <div class="weui_cell"  style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								
								    <div class="weui_cell"   style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary" >

										<div class="button_sp_area"  style=" float:right;margin-bottom:1%;">
									 <a href="<?php echo U('home/dingdan/personal_comment');?>" class="weui_btn weui_btn_mini weui_btn_default">评价订单</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">删除订单</a>
									 </div>	
									 
									 
								    </div>
								   </div>  
								</div>
                        
                          <a class="weui_cell" href="javascript:;">
							    <div class="weui_cell_hd">
							      <img src="/school+/Public/home/images/meishi.jpg"   style="width:80%; ">
							    </div>
							    <div class="dingdanneirong">
							      一个柚子饮品店<br/>
							      商品：西瓜汁（大杯）<br/>
							      送货地址：启智园3号楼<br/>
							      预计到达时间：2016-11-12&nbsp;&nbsp;13:30<br/>
							      ￥50<br/>
							      *1<br/>							      
							    </div>						    
							  </a>		  
								<div class="weui_cells">
								    <div class="weui_cell"  style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary"  style=" position:absolute; right:0;">
								      共1件商品 合计：￥50
								    </div>
								    </div>
								
								    <div class="weui_cell"  style="height:20px;">
								    <div class="weui_cell_bd weui_cell_primary" >
									 <div class="button_sp_area"  style=" float:right;margin-bottom:1%;">
									  <a href="<?php echo U('home/dingdan/personal_comment');?>" class="weui_btn weui_btn_mini weui_btn_default">评价订单</a>
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">删除订单</a>
									 </div>	
									 
								    </div>
								   </div>  
								</div>

                        </div>
                    </div>    
                                
                    </div>
                </div>
                <!--选项卡结束-->
            </div>
        </div>
        <!--导航栏结束-->
        </div>
		<!-- 中间部分结束 -->	
		
	</div>
	
	
	<!-- 底部menu开始 -->
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
	<!-- 底部menu结束 -->
	
</div>
</body>
<script type="text/javascript" src="/school+/Public/home/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/school+/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="/school+/Public/home/js/swiper.js"></script>
<script>
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

$(document).ready(function(){
    $("#canceljianzhi").click(function(){ 
    	 var tag1 = confirm('真的要取消预约吗？'); 
    	 if(!tag1){
	    	 return false;
    	 }     
    });
    });
    
$(document).ready(function(){
    $("#cancelemploy").click(function(){ 
    	 var tag2 = confirm('取消雇佣一次，三天内不得再次兼职预约，取消雇佣三次，一个月内系统不提供兼职预约功能'); 
    	 if(!tag2){
	    	 return false;
    	 }     
    });
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
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>设置</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"><!--只有IE8认识,解决兼容性问题-->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="/school+/Public/home/csscss/weui.min.css" type="text/css" rel="stylesheet">
	<link href="/school+/Public/home/csscss/jquery-weui.min.css" type="text/css" rel="stylesheet">
<style>
        html,body{
			height:100%;
		}
        .back{
        margin-top:10px;
        float:left;
        }
        .setfont{
        position:absolute;
        top:6%;
        right:45%;
        font-size:22px;
        }
        .exit{
        font-size:26px;
        color:red;
        position:absolute;
        bottom:0;
        width:100%;
        text-align:center;        
        }
</style>
</head>
<body>
<div class="weui_tab">
	<div class="weui_tab_bd">
    <!-- 返回图标开始 -->
    <div   class="back" >
    <a href="/school+/home/personal/personal/id/<?php echo ($user["ci_id"]); ?>"><img src="/school+/Public/home/images/back.jpg"  style="width:30px;height:30px;" ></a>
    </div>
    <div class="setfont">
    设置
    </div>
    <!-- 返回图标结束 -->	
    
    
    <!-- 主体部分开始 -->
    <div class="weui_cells weui_cells_access"  style="margin-top:30%">
   <a class="weui_cell" href="javascript:;">
    <div class="weui_cell_bd weui_cell_primary" >
      <p>头像</p>
    </div>
    <div class="weui_cell_ft">
    <img src="/school+/Public/home/images/head.jpg">
    </div>
  </a>
  <a class="weui_cell" href="javascript:;">
    <div class="weui_cell_bd weui_cell_primary"  >
      <p><?php echo ($user["ci_name"]); ?></p>
    </div>
    <div class="weui_cell_ft"></div>
  </a>
    <a class="weui_cell" href="/school+/home/personal/paddress/id/<?php echo ($user["ci_id"]); ?>">
    <div class="weui_cell_bd weui_cell_primary"  >
      <p>收货地址管理</p>
    </div>
    <div class="weui_cell_ft"></div>
  </a>
    <!-- <a class="weui_cell" href="javascript:;">
    <div class="weui_cell_bd weui_cell_primary"  >
      <p>修改登录密码</p>
    </div>
    <div class="weui_cell_ft"></div>
  </a> -->
</div>
    <!-- 主体部分结束 -->
    
    <!-- 底部“退出登录”开始 -->
    <!-- <div class="exit" >
    <hr/>
    
     退出登录
    </div> -->
     <!-- 底部“退出登录结束 -->
</div>
</body>
</html>
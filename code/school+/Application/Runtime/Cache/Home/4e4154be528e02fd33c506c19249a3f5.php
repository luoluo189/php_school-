<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>购物车</title>
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
            width:10%;
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
        .edit{
            width:10%;
            float:right;
            margin-right: 2%;
            margin-top: -8%;
        }
        .checkbox{
            float:left;
            margin-top:20%;
            margin-right:10%;
        }
        .image{
            width:60%;
            margin:0 auto;
        }
        .dingdan{
            margin-right:15%;
            float:left;
        }

    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_tab_bd">
        <div class="con">


            <div>
                <!-- 返回图标开始 -->
                <div class="back" >
                    <a href="index.html"><img src="/school+/Public/home/images/back.jpg"  style="width:30px;height:30px;" ></a>
                </div>
                <div class="set"  style="width:60%;">
                    购物车
                </div>
                <div class="edit">编辑</div>
                <!-- 返回图标结束 -->
            </div>
        </div>
        <!-- 主体部分开始 -->
        <div class="weui_cells"   height="100%">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary" style="height:20px;">
                    <input type="checkbox">&nbsp;&nbsp;店铺名称：一个柚子
                </div>
            </div>
        </div>
        <?php if(is_array($storename)): $i = 0; $__LIST__ = $storename;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="checkbox"><input type="checkbox" ></div>
                    <div class="image"><a href="shangpin.html"><img src="/school+/Public/home/images/chaosuannai.jpg"></a></div>
                </div>
                <div class="dingdan">
                    <?php echo ($vo['bs_gname']); ?><br/>
                    ￥<?php echo ($vo['bs_gprice']); ?><br/>
                    *<?php echo ($vo['sh_cnum']); ?>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        

        

        <div class="weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="checkboxs" >
                        <input type="checkbox" id="all">全选
                    </div>
                </div>
                <div class="button" >
                    合计：￥<?php echo ($cs); ?>&nbsp;&nbsp;<a href="<?php echo U('home/dingdan/confirm');?>"><input type="button" style="height:30px;width:40px;"value="结算"></a>
                </div>

            </div>
        </div>
        <!-- 主体部分结束 -->
    </div>


    <!--底部菜单开始-->
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
    <!--底部菜单结束-->



    </div>
</div>

</body>
<script type="text/javascript" src="/school+/Public/home/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/school+/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="/school+/Public/home/js/jquery-weui.js"></script>
<script type="text/javascript" src="/school+/Public/home/js/swiper.js"></script>
<script>
    $("#all").click(function(){
        if(this.checked){
            $(".checkbox :checkbox").attr("checked", true);
            $(":checkbox").attr("checked", true);
        }else{
            $(".checkbox :checkbox").attr("checked", false);
            $(" :checkbox").attr("checked", false);
        }
    });
</script>
</html>
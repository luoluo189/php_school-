<?php
/*
作者：尤燕飞
功能：订单模块的动态获取
*/
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();


use Think\Controller;

class DingdanController extends Controller
{

    public function confirm(){

        $media = M('customer_address');
        $m['ci_idd'] = 1;
        $m['ca_id'] = 1;
// 把查询条件传入查询方法
        $s = $media->where($m)->select(); 
        $this->assign('s',$s);
        $sql = "select bs_gname,bs_gprice,sh_cnum,bs_gurl
        from bs_goods,shopping_cart
        where bs_goods.bs_gid=shopping_cart.bs_gidd and ci_idddd=1 and bs_gid=1";
        $storename=M()->query($sql);
        $this->assign('storename',$storename);
        $this->display();

       
    }
    /*
     * 功能：购物车确认页面
     * 编写者：李雪
     * 状态：已完成
     */
    public function gouwuche_queren(){
        $_SESSION['ci_id']=1;
        $ci_id = $_SESSION['ci_id'];

        $sql = "select bs_gname,bs_gprice,sh_cnum,bs_gurl,bs_goods.bs_gid,si_id
        from bs_goods,shopping_cart,bs_type
        where bs_goods.bs_gid = shopping_cart.bs_gidd and bs_type.bs_tid = bs_goods.bs_tid and ci_idddd = $ci_id";
        $storename=M()->query($sql);

        //dump($storename);
        $this->assign('storename',$storename);

        $n= count($storename);
        $count = 0;
        for ($i=0; $i < $n ; $i++) {
            $c=$storename[$i][sh_cnum]*$storename[$i][bs_gprice];
            $count=$count+$c;
        }
        $this->assign('cs',$count);
        $this->display();
    }
    /*
    作者：尤燕飞
    功能：订单评价页的动态获取
    修改者：李雪
    */
    public function personal_comment(){

        $_SESSION['ci_id'] = 1;
        $ci_id = $_SESSION['ci_id'];//客户id


        //获取到店家id,从而获取到店家信息
        $si_id = I('get.si_id');//店家id
        $store = M('store_information')->where("si_id = $si_id")->select();
        $this->assign('store',$store);

        if($store[0]['s_type_id'] == 2){//如果是店家商品
            $id = I('get.id');//商品id

            $goods = M('bs_goods')->where("bs_gid = $id") ->select();
            $this->assign('goods',$goods);
            $this->display();
        }
        else if($store[0]['s_type_id'] == 1){//理发
            $id = I('get.id');//理发预约id
            $order = M('order_trade')->where("or_tdid = $id") ->select();
            $this->assign('order',$order);
            $this->display();
            }

    }


    /*
     * 功能：点击发表评论的功能的实现
     * 编写者：李雪
     * 状态：已完成
     */
    public function submit(){
        $_SESSION['ci_id'] = 1;
        $ci_id = $_SESSION['ci_id'];//客户id
        $si_id = I('get.si_id');//店家id
        $store = M('store_information')->where("si_id = $si_id")->select();
//        if开始
        if($store[0]['s_type_id'] == 2){//如果是店家商品
            $bs_gid = I('bs_gida');//获取商品id
            $data = array();
            $data['appr_content'] = I('appr_content');
            $data['appr_score'] = I('appr_score');
            $data['si_iddd'] = $si_id;
            $data['bs_gid'] =  $bs_gid;
            $data['ci_iddd'] = $ci_id;

            //首先在数据库中查询该客户是否评论过该商品
            $r = M('appraise')->where("ci_iddd = $ci_id AND bs_gid = $bs_gid  ")->count();
            if(!$r){//如果数据库中未查询到相关数据
                if($data['appr_content'] && $data['appr_score']){
                    $result = M('appraise')->add($data);
                    echo <<<STR
				<script type="text/javascript">
					alert('评论发表成功了呢！');
                    window.location.href = "/index.php/home/pingjia/fengping?id=$si_id";
				</script>
STR;
                }
                else{
                    echo <<<STR
				<script type="text/javascript">
					alert('请先写入您的评论哦！');
                    window.history.go(-1);
				</script>
STR;
                }
            }
            else{//如果查询到相关数据
                echo <<<STR
				<script type="text/javascript">
					alert('您已经评论过该订单了呢！');
                    window.history.go(-1);
				</script>
STR;

            }

        }
        //if结束

//        elseif开始
        else if($store[0]['s_type_id'] == 1){//如果是理发
            $bs_gid = I('bs_gidb');//获取理发预约id
            $data = array();
            $data['appr_content'] = I('appr_content');
            $data['appr_score'] = I('appr_score');
            $data['si_iddd'] = $si_id;
            $data['bs_gid'] = $bs_gid;
            $data['ci_iddd'] = $ci_id;

            //首先在数据库中查询该客户是否评论过该商品
            $r = M('appraise')->where("ci_iddd = $ci_id AND bs_gid = $bs_gid  ")->count();
            if(!$r){//如果数据库中未查询到相关数据

                if($data['appr_content'] && $data['appr_score']){
                    $result = M('appraise')->add($data);
                    echo <<<STR
				<script type="text/javascript">
					alert('评论发表成功了呢！');
                    window.location.href = "/index.php/home/pingjia/fengping?id=$si_id";
				</script>
STR;
                }
                else{
                    echo <<<STR
				<script type="text/javascript">
					alert('请先写入您的评论哦！');
                    window.history.go(-1);
				</script>
STR;
                }
            }
            else{//如果查询到相关数据
                echo <<<STR
				<script type="text/javascript">
					alert('您已经评论过该订单了呢！');
                    window.history.go(-1);
				</script>
STR;

            }
        }
//        elseif结束

    }

    /*
    作者：尤燕飞
    功能：商品预约、兼职、理发预约、全部订单页的动态获取
   */
    public function personal_list(){
        //最新订单
        $_SESSION['ci_id'] = 1;
        $ci_id=$_SESSION['ci_id'];


        //商品预约
        $sql1="select store_information.si_id,bs_mgnum,bs_tr_inaddress,si_name,bs_gname,bs_gprice,bs_tr_inmoney,bs_tr_time,bs_gid,bs_gurl
        from bs_many_goods,bs_trade,bs_trade_information,store_information,bs_goods
        where bs_many_goods.bs_tr_id=bs_trade.bs_tr_id and bs_trade.bs_tr_id=bs_trade_information.bs_tr_idd and ci_id5=$ci_id and bs_trade.bs_sid=store_information.si_id and bs_goods.bs_gid=bs_many_goods.bs_giddd";
//        $sql1="select * from bs_trade,bs_trade_information where ci_id5=$ci_id";
        $c=M()->order('bs_tr_time desc')->query($sql1);
        $this->assign('c',$c);

        //兼职订单

        $sql2="select pt_inname,pt_inmoney,pt_trtime,pt_information.pt_inid
       from pt_information,pt_trade
       where pt_information.pt_inid=pt_trade.pt_inid and ci_id=$ci_id";
        $s = M()->order('pt_trtime desc')->query($sql2);
        //dump($s);
        $this->assign('s',$s);
        //理发订单
        $sql3="select store_information.si_id,si_name,or_typename,hair_long,or_tdday,or_tdtime,si_id,or_tdid,si_image
        from store_information,order_trade
       where order_trade.storeid=store_information.si_id and order_trade.ci_idid=$ci_id";
        $s1 = M()->order('or_tdday desc,or_tdtime desc')->query($sql3);
        //dump($s1);
        $this->assign('s1',$s1);
        //已完成订单


        $this->display();
    }

}
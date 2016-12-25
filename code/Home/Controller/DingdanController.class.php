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

    /*
     * 功能：订单结算页面
     * 编写者：高小力
     *修改者：李雪
     */
    public function confirm(){
        $_SESSION['ci_id'] = 1;
        $ci_id = $_SESSION['ci_id'];//客户id
        $ca_idd = M('customer_information')->where("ci_id=$ci_id")->getField('ca_idd',true);//顾客地址id
        $ca_idds = $ca_idd[0];
        // 把查询条件传入查询方法
        $s = M('customer_address')->where("ca_id = $ca_idds")->select();
        $this->assign('s',$s);

        $sql = "select bs_gname,bs_gprice,sh_cnum,bs_gurl
        from bs_goods,shopping_cart
        where bs_goods.bs_gid=shopping_cart.bs_gidd and ci_idddd = $ci_id and bs_gid = 1";
        $storename=M()->query($sql);

        $this->assign('storename',$storename);
        $this->display();
    }
    /*
     * 功能：购物车确认页面
     * 编写者：尤燕飞
     * 状态：已完成
     * 修改者：李雪
     */
    public function gouwuche_queren()
    {
        $_SESSION['ci_id'] = 1;

        $ci_id = $_SESSION['ci_id'];

        $storegoods = M('shopping_cart')->where("ci_idddd = $ci_id")->getField('si_ids',true);
//        dump($storegoods);

        $storeid = array_keys(array_count_values($storegoods));//获取到了不重复的店家id

        for ($i = 0; $i < count($storeid); $i++) {
            $conditions['si_ids'] = $storeid[$i];//查询条件
            $conditions['ci_idddd'] = $ci_id;
            //获取商品id和数量
            $storenameid[$storeid[$i]] = M('shopping_cart')->where($conditions)->select();
            $news = $storenameid[$storeid[$i]];//购物车的信息
        }
//        dump($storenameid);
        $this->assign('storename',$storenameid);//显示店家id


        $n = count($storegoods);
        $count = 0;
        for ($i=0; $i < $n ; $i++) {
            $c=$storegoods[$i]['sh_cnum']*$storegoods[$i]['bs_gprice'];
            $count=$count+$c;
        }
        $this->assign('cs',$count);
        $this->display();
    }


    /*
     * 功能：购物车页面删除订单
     * 编写者;李雪
     * 状态：已完成
     */
    public function deleteorder(){
        $sh_cid = I('get.sh_cid');
        $result = M('shopping_cart')->where("sh_cid=$sh_cid")->delete();
        if($result){
            $referer = $_SERVER['HTTP_REFERER'];
            echo "<script>document.location.href='$referer'</script>";
        }
        else{
            echo "<script>alert('删除失败');window.history.go(-1);</script>";
        }
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



    /*
     * 功能：收货地址管理页
     * 编写者：孙池晔
     * 状态：已完成
     * 修改者：李雪
     */
    public function setaddress()
    {
        layout(false);
        $_SESSION['ci_id'] = 1;

        $_nb = M('customer_information');
        $condition1 = array();
        $condition1['ci_id'] = $_SESSION['ci_id'];//应该获取到的是该微信号本身的id，这里由于还未实现自动得到微信号本身的id，所以手动输入id
        $result1 = $_nb->where($condition1)->select();
        $this->assign('user', $result1[0]);
        //var_dump($_GET['id']);
        //获得地址数据表
        $_db = M('customer_address');
        $_mb = $_db->table('customer_information')->select();
        $condition = array();
        $condition['ci_idd'] = $condition1['ci_id'];
        $result = $_db->where($condition)->order('ca_id')->select();

        $this->assign('address', $result);

        $this->display();
    }



        /*
        * 功能：默认地址修改
        * 编写者：李雪
        * 状态：已完成
        */

    public function set(){
        $id = I('get.id');
        $_SESSION['ci_id'] = 1;
        $ci_id = $_SESSION['ci_id'];
        $data = array();
        $data['ci_id'] = $ci_id;
        $data['ca_idd'] = $id;
        $result = M('customer_information')->where("ci_id=$ci_id")->save($data);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
<?php

namespace Home\Controller;
    /*
    作者：尤燕飞
    功能：订单模块的动态获取
    */
//开启输出缓冲区
ob_start();
//开启会话
session_start();

use Think\Controller;

class DingdanController extends Controller
{
    public function confirm(){
        $ci_id=$_SESSION['ci_id'];
        $media = M('customer_address');
        $m['ci_idd'] = $ci_id;
        $m['ca_id'] = 1;
// 把查询条件传入查询方法
        $s = $media->where($m)->select();
        $this->assign('s',$s);
        $sql = "select bs_gname,bs_gprice,sh_cnum,bs_gurl
        from bs_goods,shopping_cart
        where bs_goods.bs_gid=shopping_cart.bs_gidd and ci_idddd=$ci_id and bs_gid=1";
        $storename=M()->query($sql);

        $this->assign('storename',$storename);
        $this->display();


    }
    public function gouwuche_queren(){
        $ci_id=$_SESSION['ci_id'];
        $sql = "select bs_gname,bs_gprice,sh_cnum,bs_gurl,bs_goods.bs_gid,si_id
        from bs_goods,shopping_cart,bs_type
        where bs_goods.bs_gid = shopping_cart.bs_gidd and bs_type.bs_tid = bs_goods.bs_tid and ci_idddd = $ci_id";
        $storename=M()->query($sql);

        //dump($storename);
        $this->assign('storename',$storename);

        $n= count($storename);
        $count=0;
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
    */
    /*
       作者：尤燕飞
       功能：订单评价页的动态获取
       修改者：李雪
       */
    public function personal_comment(){


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
//        $_SESSION['ci_id'] = 1;
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
        /*
        3	理发预约进行中
        4	理发预约推迟十分钟

        7	购物交易进行中

        8	兼职预约成功
        9	发布人同意雇佣

         */
        $ci_id=$_SESSION['ci_id'];
//        $ci_id=6;
//        dump($ci_id);
        //商品预约
        $sql1="select store_information.si_id,bs_mgnum,bs_tr_inaddress,si_name,bs_gname,bs_gprice,bs_tr_inmoney,bs_tr_time,bs_gid,bs_gurl,bs_trade.ts_iddd,bs_trade.bs_tr_id,si_phone
        from bs_many_goods,bs_trade,bs_trade_information,store_information,bs_goods
        where bs_many_goods.bs_tr_id=bs_trade.bs_tr_id and bs_trade.bs_tr_id=bs_trade_information.bs_tr_idd and ci_id5=$ci_id and bs_trade.bs_sid=store_information.si_id and bs_goods.bs_gid=bs_many_goods.bs_giddd and bs_trade.ts_iddd=7 and if_see=1";
//        $sql1="select * from bs_trade,bs_trade_information where ci_id5=$ci_id";
        $c=M()->order('bs_tr_time desc')->query($sql1);
        $this->assign('c',$c);

        //兼职订单

        $sql2="select pt_inname,pt_inmoney,pt_trtime,pt_information.pt_inid,pt_trade.pt_trid,pt_trade.ts_id
       from pt_information,pt_trade
       where pt_information.pt_inid=pt_trade.pt_inid and ci_id=$ci_id and pt_trade.ts_id in (8,9) and pt_trifsee=1";
        $s = M()->order('pt_trtime desc')->query($sql2);
        //dump($s);
        $this->assign('s',$s);


        //理发订单
        $sql3="select store_information.si_id,si_name,or_typename,hair_long,or_tdday,or_tdtime,si_id,or_tdid,si_image,order_trade.or_tdid,order_trade.ts_idd,si_phone
       from store_information,order_trade
       where order_trade.storeid=store_information.si_id and order_trade.ci_idid=$ci_id and order_trade.ts_idd in (3,4) and or_ifsee=1";
        $s1 = M()->order('order_trade.or_tdid DESC')->query($sql3);
        //dump($s1);
        $this->assign('s1',$s1);
        /*
         * 已完成订单
         *  1	理发预约取消
            2	理发预约完成

            5	购物交易取消
            6	购物交易完成

            10	发布人取消预约
            11	兼职人取消雇佣
            12	发布者取消雇佣
            13	兼职人取消预约

         *
         */

        //商品预约已完成
        $sqlGfinished ="select store_information.si_id,bs_mgnum,bs_tr_inaddress,si_name,bs_gname,bs_gprice,bs_tr_inmoney,bs_tr_time,bs_gid,bs_gurl,bs_trade.ts_iddd,bs_trade.bs_tr_id,si_phone
        from bs_many_goods,bs_trade,bs_trade_information,store_information,bs_goods
        where bs_many_goods.bs_tr_id=bs_trade.bs_tr_id and bs_trade.ts_iddd  in (5,6) and bs_trade.bs_tr_id=bs_trade_information.bs_tr_idd and ci_id5=$ci_id and bs_trade.bs_sid=store_information.si_id and bs_goods.bs_gid=bs_many_goods.bs_giddd and if_see=1";

        $c=M()->order('bs_tr_time desc')->query($sqlGfinished);
        $this->assign('finishedGoods',$c);

        //理发预约已经完成
        //理发订单
        $sql3="select store_information.si_id,si_name,or_typename,hair_long,or_tdday,or_tdtime,si_id,or_tdid,si_image,order_trade.or_tdid,order_trade.ts_idd,si_phone
       from store_information,order_trade
       where order_trade.storeid=store_information.si_id and order_trade.ci_idid=$ci_id and order_trade.ts_idd in (1,2) and or_ifsee=1";
        $s1 = M()->order('order_trade.or_tdid DESC')->query($sql3);
        //dump($s1);
        $this->assign('finishedHorder',$s1);
        //兼职预约已经完成
        $sqlPfinished="select pt_inname,pt_inmoney,pt_trtime,pt_information.pt_inid,pt_trade.pt_trid,pt_trade.ts_id
       from pt_information,pt_trade
       where pt_information.pt_inid=pt_trade.pt_inid and ci_id=$ci_id and pt_trade.ts_id in (10,11,12.13) and pt_trifsee=1";
        $s = M()->order('pt_trtime desc')->query($sqlPfinished);
        //dump($s);
        $this->assign('finishedPart',$s);

        $this->display();
    }
    /*
  作者：骆静静
  功能：订单管理
 */
    /*
        作者：骆静静
        功能：订单管理之商品确认订单
        状态：完成
    */
    public function confirmGoods(){
        $data=I('get.');
//        dump($data);
        $bs_tr_id=$data['bs_tr_id'];
        $_db=M('bs_trade');
        $data['bs_tr_id']=$bs_tr_id;

        //数据库获取订单状态
        $type= $_db->select($bs_tr_id);
        $type = $data['ts_iddd'];
        //判断订单的状态订单取消后不可以再次确定
        if($type== 5){
            // 要修改的数据对象属性赋值
            echo "<script>alert('订单已经取消不能确定呢！') ;history.go(-1);</script>";

        }
        elseif($type==6){
//            订单已经确定
            echo "<script>alert('订单已经确定！') ;history.go(-1);</script>";


        }
        else{
            $data['ts_iddd'] = 6;
            if($_db->save($data)) {
                echo <<<STR
				<script type="text/javascript">
					alert('订单确认成功');
                    window.location.href = "/index.php/home/dingdan/personal_list";
				</script>
STR;
            }else{
                echo <<<STR
                    <script type="text/javascript">
                        alert('订单确认失败');
                        window.location.href = "/index.php/home/dingdan/personal_list";
                    </script>
STR;
            }
        }
    }

    /*
         作者：骆静静
         功能：订单管理之商品取消订单
         状态：完成
     */
    public function cancelGoods(){
        $data=I('get.');
        $_db=M('bs_trade');
        $type = $data['ts_iddd'];

        //判断订单的状态订单取消后不可以再次确定
        if($type== 6){
            // 要修改的数据对象属性赋值
            echo "<script>alert('订单已经确定不能取消呢！') ;history.go(-1);</script>";
        }
        elseif($type==5){
            echo "<script>alert('订单已经取消！') ;history.go(-1);</script>";
        }
        else{
            $data['ts_iddd'] = 5;
            if($_db->save($data)) {
                echo <<<STR
				<script type="text/javascript">
					alert('订单取消成功');
                    window.location.href = "/index.php/home/dingdan/personal_list";
				</script>
STR;
            }else{
                echo <<<STR
                    <script type="text/javascript">
                        alert('订单取消失败');
                        window.location.href = "/index.php/home/dingdan/personal_list";
                    </script>
STR;
            }
        }
    }

    /*
      作者：骆静静
      功能：订单管理之兼职预约取消预约
      状态：完成
  */
    public function cancelOrder(){

        $data=I('get.');
        $_db=M('pt_trade');

        //数据库获取订单状态
        /*
         * 8	兼职预约成功
            9	发布人同意雇佣
            10	发布人取消预约
            11	兼职人取消雇佣
            12	发布者取消雇佣
            13	兼职人取消预约
         */

        $type = $data['ts_id'];
        //判断订单的状态订单取消后不可以再次确定

        if($type == 8) {
//            echo "<script>confrim('www确认取消预约？');</script>";
            $data['ts_id'] = 13;
            if ($_db->save($data)) {
                echo <<<STR
                    <script type="text/javascript">
                        alert('取消预约成功');
                        window.location.href = "/index.php/home/dingdan/personal_list";
                    </script>
STR;
            } else {
                echo <<<STR
                        <script type="text/javascript">
                            alert('取消预约失败');
                            window.location.href = "/index.php/home/dingdan/personal_list";
                        </script>
STR;
            }

        }else{
            switch ($data['ts_id'])
            {
                case 8:
                    $news= "您正在等待录用，可以取消预约";
                    break;
                case 9:
                    $news= "发布人已经录取您啦！";
                    break;
                case 10:
                    $news= "您的预约已被发布人取消";
                    break;
                case 11:
                    $news= "您已经拒绝录用";
                    break;
                case 12:
                    $news= "您被发布人取消录用";
                    break;
                case 13:
                    $news= "您已经取消预约了";
                    break;
            }
//            echo $news;
            echo <<<STR
                        <script type="text/javascript">
                            alert('$news');
                              window.location.href = "/index.php/home/dingdan/personal_list";
                     
                        </script>
STR;
        }
    }
    /*
    作者：骆静静
    功能：订单管理之兼职预约取消录用
    状态：完成
*/
    public function cancelHire()
    {
        $data = I('get.');
        $_db = M('pt_trade');
        //数据库获取订单状态
        $type = $data['ts_id'];

        //判断订单的状态订单取消后不可以再次确定
        /*
         * 8	兼职预约成功
            9	发布人同意雇佣
            10	发布人取消预约
            11	兼职人取消雇佣
            12	发布者取消雇佣
            13	兼职人取消预约
         */
        if ($type == 9) {
            // 要修改的数据对象属性赋值
            $data['ts_id']=11;
            if($_db->save($data)) {
                echo <<<STR
                    <script type="text/javascript">
                        alert('取消录用成功');
                        window.location.href = "/index.php/home/dingdan/personal_list";
                    </script>
STR;
            }else{
                echo <<<STR
                        <script type="text/javascript">
                            alert('取消录用失败')
                            window.location.href = "/index.php/home/dingdan/personal_list";
                        </script>
STR;
            }

        }else{
            switch ($data['ts_id'])
            {
                case 8:
                    $news= "您正在等待录用，可以取消预约";
                    break;
                case 10:
                    $news= "您的预约已被发布人取消";
                    break;
                case 11:
                    $news= "您已经拒绝录用";
                    break;
                case 12:
                    $news= "您被发布人取消录用";
                    break;
                case 13:
                    $news= "您已经取消取消预约了";
                    break;
            }
//            echo $news;
            echo <<<STR
                        <script type="text/javascript">
                            alert('$news');
                              window.location.href = "/index.php/home/dingdan/personal_list";
                     
                        </script>
STR;

        }
    }
    /*
     作者：骆静静
     功能：订单管理之理发预约推迟十分钟
     状态：完成
 */
    public function putoffHorder(){
        $data=I('get.');
        $_db=M('order_trade');
        $or_tdid=$data['or_tdid'];
        $type=$data['ts_idd'];
        /*
         *1	理发预约取消
          2 理发预约完成
          3	理发预约进行中
          4	理发预约推迟十分钟
         */
        if($type==3){
            $data['ts_idd']=4;
            if($_db->save($data)){
                echo <<<STR
                    <script type="text/javascript">
                        alert('理发预约推迟成功');
                        window.location.href = "/index.php/home/dingdan/personal_list";
                    </script>
STR;
            }else{
                echo <<<STR
                    <script type="text/javascript">
                        alert('推迟失败');
                        window.location.href = "/index.php/home/dingdan/personal_list";
                    </script>
STR;
            }
        }else{
            switch ($data['ts_idd']) {
                case 1:
                    $news = "您的预约已经取消";
                    break;
                case 2:
                    $news = "您的预约已经完成";
                    break;
                case 3:
                    $news = "预约正在进行中";
                    break;
                case 4:
                    $news = "预约推迟10分钟";
                    break;
            }
            echo <<<STR
                        <script type="text/javascript">
                            alert('$news');
                              window.location.href = "/index.php/home/dingdan/personal_list";                     
                        </script>
STR;
        }
    }

    /*
     作者：骆静静
     功能：订单管理之理发预约取消预约
     状态：完成
 */
    public function cancelHorder(){
        $data=I('get.');
        $_db=M('order_trade');
        $or_tdid=$data['or_tdid'];
        $type=$data['ts_idd'];
        /*
         *1	理发预约取消
          2 理发预约完成
          3	理发预约进行中
          4	理发预约推迟十分钟
         */
        if($type==3 ||$type==4){
            $data['ts_idd']=1;
            if($_db->save($data)){
                echo <<<STR
                    <script type="text/javascript">
                        alert('理发预约取消成功');
                        window.location.href = "/index.php/home/dingdan/personal_list";
                    </script>
STR;
            }else{
                echo <<<STR
                    <script type="text/javascript">
                        alert('取消失败');
                        window.location.href = "/index.php/home/dingdan/personal_list";
                    </script>
STR;
            }
        }else{
            switch ($data['ts_idd']) {
                case 1:
                    $news = "您的预约已经取消";
                    break;
                case 2:
                    $news = "您的预约已经完成，不可以取消哟~";
                    break;

            }
            echo <<<STR
                        <script type="text/javascript">
                            alert('$news');
                              window.location.href = "/index.php/home/dingdan/personal_list";                     
                        </script>
STR;
        }
    }
//    订单完成部分的订单软删除
    /*
     作者：骆静静
     功能：订单管理之商品订单的删除（软）
     状态：完成
 */

}
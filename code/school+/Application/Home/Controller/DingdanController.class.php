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
//        顾客id
        $m['ci_idd'] = $_SESSION['ci_id'];
//        地址id
        $m['ca_id'] = 1;
// 把查询条件传入查询方法
        $s = $media->where($m)->select(); 
        $this->assign('s',$s);
        $sql = "select bs_gname,bs_gprice,sh_cnum,bs_gurl
        from bs_goods,shopping_cart
        where bs_goods.bs_gid=shopping_cart.bs_gidd and ci_idddd=1 and bs_gid=1";
        $storename=M()->query($sql);
       // dump($storename);
        // $n= count($storename);
        // $count=0;
        //  for ($i=0; $i < $n ; $i++) { 
        //      $c=$storename[$i][sh_cnum]*$storename[$i][bs_gprice];
        //      $count=$count+$c;
        //  }
        
        //   $this->assign('cs',$count);
           $this->assign('storename',$storename);
        $this->display();

       
    }
    public function gouwuche_queren(){
//        $_db=M('shopping_cart');
//
//        $condition['ci_idddd']=1;
//        $condition1=$_db->where($condition)->select();
//        //dump($condition1);
//         $n=count($condition1);
//        for ($i=0; $i < $n ; $i++) {
//            $storename[]=M('bs_goods')->where("bs_gid=%d",array($condition1[$i]['bs_gidd']))->find();
//        }
//        $this->assign('cs',$condition1);
//        $this->display();




        $sql = "select bs_gname,bs_gprice,sh_cnum,bs_gurl,bs_goods.bs_gid
         from bs_goods,shopping_cart
         where bs_goods.bs_gid=shopping_cart.bs_gidd and ci_idddd=1";
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
    public function personal_comment(){
        $or_tdid['or_tdid']= $_GET['id'];
       $c1 = M('order_trade')->where($or_tdid)->select();
        $this->assign('c1',$c1);
        $pt_inid['pt_inid']= $_GET['id'];
        $c2 = M('pt_information')->where($pt_id)->select();
        $this->assign('c2',$c2);
        $bs_gid['bs_gid']=$_GET['id'];
        $c3 = M('bs_goods')->where($bs_gid)->select();
        $this->assign('c3',$c3);
        $this->display();
    }
    /*
    作者：尤燕飞
    功能：商品预约、兼职、理发预约、全部订单页的动态获取
   */
    public function personal_list(){
        //最新订单
        //商品预约
        $sql1="select bs_mgnum,bs_tr_inaddress,si_name,bs_gname,bs_gprice,bs_tr_inmoney,bs_tr_time,bs_gid,bs_gurl
        from bs_many_goods,bs_trade,bs_trade_information,store_information,bs_goods
        where bs_many_goods.bs_tr_id=bs_trade.bs_tr_id and bs_trade.bs_tr_id=bs_trade_information.bs_tr_idd and ci_id5=1 and bs_trade.bs_sid=store_information.si_id and bs_goods.bs_gid=bs_many_goods.bs_giddd";
        $c=M()->order('bs_tr_time desc')->query($sql1);
        $this->assign('c',$c);
        // dump($s);

        //兼职订单
        // $_db=M('pt_trade');
        // $condition['ci_id']=1;
        // $condition1=$_db->where($condition)->select();
        // $n=count($condition1);
       $sql2="select pt_inname,pt_inmoney,pt_trtime,pt_information.pt_inid
       from pt_information,pt_trade
       where pt_information.pt_inid=pt_trade.pt_inid and ci_id=1";
       $s = M()->order('pt_trtime desc')->query($sql2);
       //dump($s);
       $this->assign('s',$s);
       //理发订单
       $sql3="select si_name,or_typename,hair_long,or_tdday,or_tdtime,si_id,or_tdid,si_image
       from store_information,order_trade
       where order_trade.storeid=store_information.si_id and order_trade.ci_idid=1";
       $s1 = M()->order('or_tdday desc,or_tdtime desc')->query($sql3);
       //dump($s1);
       $this->assign('s1',$s1);
       //已完成订单
      
    	
        $this->display();
    }
}
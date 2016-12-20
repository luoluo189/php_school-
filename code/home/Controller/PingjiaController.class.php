<?php
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();


use Think\Controller;

class PingjiaController extends Controller
{

    public $userId=1;
//    动态获取评价
    public function fengping()
    {
        $_db=M();
        $storeid=$_GET['id'];
//        dump($storeid);
        $condition['si_id']=$_GET['id'];
        $storename=M('store_information')->where($condition)->select();
        $name = $storename[0]['si_name'];
//        dump($name);

      if($storeid==2 ||$storeid ==6){

          $sql="select distinct appr_id,appr_score,ci_name ,appr_content, appr_score 
              from appraise,customer_information ,haircut_order_type 
              where   si_iddd=$storeid and customer_information.ci_id=appraise.ci_iddd and haircut_order_type.si_idd=appraise.si_iddd ";

      }else{
        $sql="select distinct appr_id,appr_score,ci_name,appr_content,appr_score,bs_gname 
              from appraise,customer_information,bs_goods 
              where si_iddd=$storeid  and customer_information.ci_id=appraise.ci_iddd and bs_goods.bs_gid= appraise.bs_gid";
        }
        $result=M()->query($sql);
        if(!$result){
          $nocontent="这家暂无评价呦！";
        }
        $this->assign('set', $name);
        $this->assign('news',$result);
        $this->assign('nocontent',$nocontent);
        $this->display();
    }
}
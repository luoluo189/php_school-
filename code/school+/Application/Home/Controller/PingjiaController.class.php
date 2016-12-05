<?php
namespace Home\Controller;

use Think\Controller;

class PingjiaController extends Controller
{
//    动态获取评价
    public function index()
    {
        $_db=M();
//        $condition=array();
//        $condition['s_type_id']=1;
////        $id = $_GET[name];
//        dump($_GET);
        $storeid=$_GET[id];
        $condition['si_id']=$_GET[id];
        $storename=M('store_information')->where($condition)->select();
        $name = $storename[0]['si_name'];
        dump($name);

      if($storeid==2 ||$storeid ==6){

          $sql="select distinct appr_id,ci_name ,appr_content, appr_score from appraise,customer_information ,haircut_order_type where   si_iddd=2 and customer_information.ci_id=appraise.ci_iddd and haircut_order_type.si_idd=appraise.si_iddd ";

      }else{
        $sql="select distinct appr_id,ci_name,appr_content,appr_score,bs_gname from appraise,customer_information,bs_goods where si_iddd=$storeid  and customer_information.ci_id=appraise.ci_iddd and bs_goods.bs_gid= appraise.bs_gid";
        }
        dump($sql);
        $result=M()->query($sql);
        dump($result);
        $this->assign('set', $name);
        $this->assign('news',$result);
        $this->display(fengping);
    }

}
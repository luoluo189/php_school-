<?php
/*
    * 功能：首页
    * 编写者：高小力
 */
namespace Admin\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;

class IndexController extends Controller
{  /*
   * 功能：判断session
   * 编写者：骆静静
   * 状态：已完成
   */
    public function _before_index(){
        if($_SESSION['loginedName']==NULL || $_SESSION['si_id']==NULL){
            $jumpUrl = '/home/';
            echo "<script> alert('您的登陆已经过期，请重新登陆！');</script>";
            $this->redirect($jumpUrl);
        }

    }
    /*
    * 功能：商品后台首页
    * 编写者：高小力
    */
    public function index()
    {
        $seller=M('store_information');
        $condition=array();
        $condition['si_id']=$_SESSION['si_id'];
        $seller=$seller->where($condition)->select();
        //dump($seller);
        $seller=$seller[0];
        //dump($seller);
        $this->assign('seller',$seller);

        //店家种类的判断
        if($seller[s_type_id]==1)
        {
            $type="理发店";
        }elseif($seller[s_type_id]==2)
        {
            $type="商品店";
        }
        else{
            $type="兼职发布人";
        }
        $this->assign('type',$type);
        $this->display();

    }

}
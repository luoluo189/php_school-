<?php
namespace Lifaadmin\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {

        $_db=M('store_information');
        $condition=array();
        $condition['si_id']=$_SESSION['si_id'];;
        $result=$_db->where($condition)->select();
        $result= $result[0];
//        dump($result[si_address]);
        $this->assign('store', $result);

        if($result[s_type_id]==1)
        {
            $type="理发店";
        }elseif($result[s_type_id]==2)
        {
            $type="商品店";
        }
        else{
            $type="兼职发布人";
        }
        $this->assign('type',$type);
//        dump($result);
        $this->display();
        $this->display();
    }

}
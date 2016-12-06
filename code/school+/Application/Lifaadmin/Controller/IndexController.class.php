<?php
namespace Lifaadmin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {

        $_db=M('store_information');
        $condition=array();
        $condition['si_id']=6;
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
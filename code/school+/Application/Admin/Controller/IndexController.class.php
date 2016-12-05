<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $seller=M('store_information');
        $condition=array();
        $condition['si_id']=1;
        $seller=$seller->where($condition)->select();
        //dump($seller);
        $seller=$seller[0];
        //dump($seller);
        $this->assign('seller',$seller);
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
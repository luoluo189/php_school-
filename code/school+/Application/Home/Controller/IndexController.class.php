<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->display();
    }

       /*
        * 功能：搜索
        * 编写者：安垒
        * 状态：
        */
    public function search(){
        $key=I('get.search_word');
        dump($key);
        $sellUserModel = M('bs_goods');
        $where['bs_gname']=array('like',"%{$key}%");
        $where['bs_gdescription']=array('like',"%{$key}%");
        $where['_logic']='OR';
        $list=$sellUserModel->where($where)->select();

        dump($list);

        $this->display(sousuo);
    }
    public function personal(){
        redirect('/home/personal/personal');
    }
    public function gouwuche(){
        redirect('/home/dingdan/gouwuche_queren');
    }
}
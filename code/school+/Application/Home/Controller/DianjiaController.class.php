<?php
namespace Home\Controller;

use Think\Controller;

class DianjiaController extends Controller
{
//    public function index()
//    {
//        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
//        $this-display(dianjia-jianjie);
//    }

    public function dianjia(){

        //通过店家ID获取商品种类
        $condition['si_id']=$_GET[id];
        $goodtype = M('bs_type')->where($condition)->select();

        //获取商品详细信息
        $goodname = M('bs_goods')->select();
       // var_dump($goodname);
        $this->assign('bs_goods',$goodname);

        $this->display();
    }

    public function index(){
        //通过店家ID获取商品种类
        $condition['si_id']=$_GET[id];
        $goodtype = M('bs_type')->where($condition)->select();

        //获取商品详细信息
        $goodname = M('bs_goods')->select();
        $this->assign('bs_goods',$goodname);
        $this->display();
    }

    public function jianjie(){
        //$id = I('si_id');
        $Model1 = M('bs_type');
        $Model2 = M('store_information');
        $type1 = $Model1->where('si_id=1')->select();
        $type2 = $Model2->where('si_id=1')->select();
        //var_dump($type2);
        $si = array();
        $si['si_sintroduce'] = I('si_sintroduce');
        var_dump($si['si_sintroduce']);
        $this->assign('bs_type',$type1);
        $this->assign('text',$type2);
        $this->display();
    }

    public function pingjia(){
        $this->display();
    }

    public function shangpin(){
        $this->display();
    }

    public function meishi(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=2;        
        $result=$_db->where($condition)->select();  
        $this->assign('store_information', $result);
        $this->display();
    }

    public function shangjia(){
        $_db=M('store_information');
        //$condition=array();               
        $result=$_db->select();  
        $this->assign('store_information', $result);
        $this->display();
    }
}
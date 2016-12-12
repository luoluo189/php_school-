<?php

namespace Home\Controller;

use Think\Controller;

class DianjiaController extends Controller
{
    /*
     * 功能：店家界面
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function dianjia(){
        //通过店家ID获取商品种类
        $condition['si_id']=$_GET['si_id'];
        $name = M('store_information')->where($condition)->select();
        $set = array();
        $set = $name[0];
        $goodtype = M('bs_type')->where($condition)->select();
        //var_dump($goodtype);

        $tid=array();
        $_db=M('bs_goods');
        for($i=0;$i<count($goodtype);$i++){
            $tid[$i]= $goodtype[$i]['bs_tid'];
            $conditions['bs_tid']=$tid[$i];
            $goodname[$i] = M('bs_goods')->where($conditions)->select();
             //var_dump($goodname[$i]);
        }
        //var_dump($tid);
        //获取推荐信息
        $conditionss['bs_rname'] = '推荐';
        $result = M('bs_recommend')->where($conditionss)->select();
         $commen =array();
         $commen = $result[0];
         //var_dump($commen);
         $this->assign('commen',$commen);

         $this->assign('set',$set);
        //获取商品详细信息
         // 数据库sql语句拼接？
        $this->assign('bs_goods',$goodname);
        $this->assign('image',$name);
        $this->display();
    }
    /*
     * 功能：index显示
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function index(){
        //通过店家ID获取商品种类
        $condition['si_id']=$_GET['si_id'];
        $name = M('store_information')->where($condition)->select();
        $set = array();
        $set = $name[0];
        $goodtype = M('bs_type')->where($condition)->select();
        //var_dump($goodtype);
        $tid=array();
        $_db=M('bs_goods');
        for($i=0;$i<count($goodtype);$i++){
            $tid[$i]= $goodtype[$i]['bs_tid'];
            $conditions['bs_tid']=$tid[$i];
            $goodname[$i] = M('bs_goods')->where($conditions)->select();
             //var_dump($goodname[$i]);
        }
        //var_dump($tid);
        $conditionss['bs_rname'] = '推荐';
        $result = M('bs_recommend')->where($conditionss)->select();
         $commen =array();
         $commen = $result[0];
         //var_dump($commen);
         $this->assign('commen',$commen);

         $this->assign('set',$set);
        $this->assign('bs_goods',$goodname);
        $this->display();
    }

    /*
     * 功能：店家简介
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function jianjie(){
        //获取店家ID
        $condition['si_id'] = $_GET['si_id'];
        //var_dump($condition);
        $Model1 = M('bs_type');
        $Model2 = M('store_information');
        $type1 = $Model1->where($condition)->select();
        $type2 = $Model2->where($condition)->select();
        //var_dump($type2);
        $si = array();
        $si= $type2[0];
        //var_dump($si);
        $this->assign('bs_type',$type1);
        $this->assign('si',$si);
        $this->display();
    }

    public function pingjia(){
        $this->display();
    }

    /*
     * 功能：商品列表
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function goodslist(){
        $condition['bs_tid'] = $_GET['bs_tid'];
        $result=M('bs_goods')->where($condition)->select();
        $set0=M('bs_type')->where($condition)->select();
        //var_dump($set);
        $set=array();
        $set = $set0[0];
        $this->assign('bs_goods',$result);
        $this->assign('set',$set);
        $this->display();
    }

    /*
     * 功能：商品详情
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function shangpin(){
        //获取商品id
        //$condition=array();  
        $condition['bs_gid'] = $_GET['bs_gid'];
        $conditions['si_id'] = $_GET['si_id'];
        //$condition['bs_gid'] = 4;
        $result=M('bs_goods')->where($condition)->select();
        $name=M('store_information')->where($conditions)->select();
        $set = array();
        $si = array();
        $set = $result[0];
        $si = $name[0];

        $this->assign('set',$set);
        $this->assign('si',$si);

        $this->assign('image',$name);
        $this->display();
    }

     /*
     * 功能：美食列表
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function meishi(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=2;        
        $result=$_db->where($condition)->select();  
        $this->assign('store_information', $result);
        $this->display();
    }

    /*
     * 功能：商家列表
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function shangjia(){
        $_db=M('store_information');
        //$condition=array();               
        $result=$_db->select();  
        $this->assign('store_information', $result);
        $this->display();
    }
}